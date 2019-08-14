<?php

/**
 * Created by PhpStorm.
 * User: alex.beda
 * Date: 28/03/2017
 * Time: 18:52
 */
class User_model extends CI_Model
{


	public $r_nom_prenom;
	public $r_i=0;
	public $r_email;
	public $r_mdp;
	public $r_salt;
	public $r_form='WEB';
	public $r_form_id=0;

	public $r_statut=1;

	private $table = 't_utilisateur';
	private $data_show;
	private $retour;

	function __construct()
	{
		parent::__construct();
		$this->data_show = new stdClass();
		$this->retour = new stdClass();
	}


public function maj_user()
{
	if ($this->r_i == 0) //Ajout
	{
		//Verification du mail //

		$this->db->select($this->table . '.r_email as r_email');
		$this->db->from($this->table);
		$this->db->where('r_email', $this->r_email);
		$query = $this->db->get();
		if ($query->num_rows() != 0)
		{
			return -1;
		}

		if ($this->db->insert($this->table, $this)) {
			return 1;
		}



	}

}


public function login($user,$pass)
{
	$this->db->select('*');
	$this->db->from($this->table);
	$this->db->where('r_email', $user);
	$query = $this->db->get();
	if ($query->num_rows() == 0) {

		$this->retour->status=400;
		$this->retour->message='Compte inconnu merci de rééssayer';
		return $this->retour;
	}




	$row = $query->row();
	$vpass = password_verify($pass, $row->r_mdp);
	if ($vpass!=1) {
		$this->retour->status=400;
		$this->retour->message='Login/mot de passe incorrecte ';
		return $this->retour;
	}

	if ($query->num_rows() == 0) {

		$this->retour->status=400;
		$this->retour->message='Compte inconnu merci de rééssayer';
		return $this->retour;
	}

	if ($row->r_statut !=1) {

		$this->retour->status=400;
		$this->retour->message='Compte désactivé veuillez contacter l\'admin';
		return $this->retour;
	}


	$this->retour->status=200;
	$this->data_show->i = $row->r_i;
	$this->data_show->nom_prenom = $row->r_nom_prenom;
	$this->data_show->email = $row->r_email;
	$this->data_show->form = $row->r_form;
	$this->data_show->form_id = $row->r_form_id;
	$this->data_show->r_date = $row->r_date;
	$array =  (array) $this->data_show;
	$this->session->set_userdata($array);
	$this->retour->message=$array;
	return $this->retour;


}
	public function count()
	{
		$this->db->count_all($this->table,$this);
	}


}
