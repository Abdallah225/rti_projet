<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 05/12/2018
 * Time: 00:19
 */

Class Admin_model extends CI_Model
{
	public $r_login;

	public $r_pass;
	public $r_level;
	public $r_mail;
	public $r_nom_prenoms;
	private $data_show;
	private $retour;
	private $table='t_admin';

	function __construct()
	{
		parent::__construct();
		$this->data_show = new stdClass();
		$this->retour = new stdClass();
	}


	public  function maj()
	{


		$this->r_pass=password_hash($this->r_pass, PASSWORD_DEFAULT);
		return $this->db->insert($this->table,$this);
	}


	public function login($r_info_nav,$ip_user)
	{
		$this->retour = new stdClass;
		$this->db->select($this->table . '.r_i');

		$this->db->select($this->table . '.r_login');
		$this->db->select($this->table . '.r_level');
		$this->db->select($this->table . '.r_last_cnx');

		$this->db->select($this->table . '.	r_status');
		$this->db->select($this->table . '.	r_mail');
		$this->db->select($this->table . '.	r_nom_prenoms');
		$this->db->select($this->table . '.	r_pass');
		$this->db->from($this->table);
		$this->db->where('r_login', $this->r_login);
		$query = $this->db->get();
		if ($query->num_rows()=== 0)
		{
			$this->retour->status=400;
			$this->retour->message='Login/mot de passe incorrecte ';
			return $this->retour;
		}

		$row = $query->row();

		$vpass = password_verify($this->r_pass, $row->r_pass);
		if ($vpass!=1) {

			$this->retour->status=400;
			$this->retour->message='Login/mot de passe incorrecte';
			return $this->retour;
		}



		$this->load->model('Session_model');
		$this->Session_model->r_iuser = $row->r_i;
		$this->Session_model->r_info_nav = $r_info_nav;
		$this->Session_model->r_ip = $ip_user;
		$result = $this->Session_model->creat();
		if($result ==-99)
		{
			$this->retour->status=400;
			$this->retour->message='Une exception est survenue durant la mise à jour de la session';
			return $this->retour;
		}

		$this->data_show->r_i   = $row->r_i;
		$this->data_show->r_login  = $row->r_login;
		$this->data_show->r_level  = $row->r_level;
		$this->data_show->r_last_cnx  = $row->r_last_cnx;
		$this->data_show->r_status  = $row->r_status;
		$this->data_show->r_mail  = $row->r_mail;
		$this->data_show->r_nom_prenoms  = $row->r_nom_prenoms;
		$this->data_show->session  =$result;;

		$array =  (array) $this->data_show;
		$this->session->set_userdata($array);
		$this->retour->status=200;
		$this->retour->user=$this->data_show;

		return $this->retour;


	}



	function liste()
	{
		$this->db->select($this->table.'.r_i');
		$this->db->select($this->table.'.r_login');
		$this->db->select($this->table.'.r_status');
		$this->db->select($this->table.'.r_level');
		$this->db->select('t_habilitation.r_libelle');
		$this->db->select($this->table.'.r_date');
		$this->db->select($this->table.'.r_status');
		$this->db->select($this->table.'.r_nom_prenoms');
		$this->db->select($this->table.'.r_mail');
		$this->db->from($this->table);
		$this->db->from('t_habilitation');
		$this->db->where("r_login != 'admin'");
		$this->db->where($this->table.'.r_level','t_habilitation.r_i',false);
		$query = $this->db->get();
		return $query->result();
	}

	function create()
	{

		$this->db->select($this->table . '.r_i');
		$this->db->from($this->table);
		$this->db->where($this->table.'.r_login',$this->r_login);
		$this->db->or_where($this->table.'.r_mail',$this->r_mail);

		$query = $this->db->get();
		if ($query->num_rows() !== 0)
		{
			$this->retour->status=200;
			$this->retour->error=400;
			$this->retour->message='Les informations entrées existent déjà veuillez les vérifier ';
			return $this->retour;
		}



				$this->r_pass =  password_hash($this->r_pass, PASSWORD_DEFAULT);
			if (!$this->db->insert($this->table, $this)) {
				$this->retour->status=200;
				$this->retour->error=400;
				$this->retour->message='Une erreur est survenu durant la création de cet utilisateur';
				return $this->retour;
			}
		$this->retour->status=200;
		$this->retour->error=200;
		$this->retour->message='Utilisateur créé avec succès';
		return $this->retour;
	}




	 function setStat($status,$id)
	{
		$data = array(
			'r_status' => $status
		);

		$this->db->where('r_i', $id);
		if(!$this->db->update($this->table, $data))
		{
			$this->retour->status=200;
			$this->retour->error=400;
			$this->retour->message='Une erreur est survenu durant le changement de status de cet utilisateur';
			return $this->retour;
		}
		$this->retour->status=200;
		$this->retour->error=200;
		$this->retour->message='Status mis à jour avec succes';
		return $this->retour;

	}

}
