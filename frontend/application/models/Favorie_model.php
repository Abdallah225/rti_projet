<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 31/01/2019
 * Time: 00:47
 */

class Favorie_model extends CI_Model
{

	public $r_i;
	public $r_iuser;
	public $r_iemission;

	private $table='t_favorie_user';
	private $retour = array();

	public function maj()
	{
		$this->retour = new stdClass();
		$this->db->select($this->table . '.r_i');
			$this->db->from($this->table);
			$this->db->where('r_iuser', $this->r_iuser);
			$this->db->where('r_iemission', $this->r_iemission);
			$query = $this->db->get();
			if ($query->num_rows() !== 0)
			{
				$this->retour->status=200;
				$this->retour->error=400;
				$this->retour->message='Cette émission fait déjà partie de vos favories ';
				return $this->retour;

			}
			else
			{
				if( $this->db->insert($this->table,$this))
				{
					$this->retour->status=200;
					$this->retour->error=200;
					$this->retour->message='Cette émission a été ajoutée à vos favories ';
					return $this->retour;
				}
			}


	}


	public function get($user)
	{
		$this->retour = new stdClass;
		$this->thematic = new stdClass;
		$this->emission = new stdClass;
		$this->message = new stdClass;
		$sql = "select 
t_thematique.r_i,
t_thematique.r_libelle
from t_favorie_user,t_emission,t_thematique
WHERE t_favorie_user.r_iemission=t_emission.r_i and t_emission.r_ithematique = t_thematique.r_i and t_favorie_user.r_iuser=$user
GROUP by(t_thematique.r_libelle)
";
		$query =$this->db->query($sql);

		$this->thematic=$query->result();

		$sql2 = "select 
t_favorie_user.r_iemission ,
t_emission.r_ithematique,
t_emission.r_nom,
t_emission.r_image
from t_emission,t_favorie_user
where t_emission.r_i=t_favorie_user.r_iemission and t_favorie_user.r_iuser=$user";

		$query1 =$this->db->query($sql2);
		$query1->result();

		$this->emmission=$query1->result();



		$this->message->emmission = $this->emmission;
		$this->message->thematic = $this->thematic;

		$this->retour->message=$this->message;
		$this->retour->status=200;
		$this->retour->error=200;
		return $this->retour;


	}


}
