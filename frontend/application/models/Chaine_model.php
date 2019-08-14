<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 08/11/2018
 * Time: 04:15
 */

class Chaine_model extends CI_Model
{

	public $r_i;
	public $r_libelle;
	public $r_description;
	public $r_uri;

	private $table ='t_chaine';
	public function getdata($statut=0,$chaine=0)
	{
		$this->db->select('*');
		$this->db->from($this->table);

		if($chaine !=0){ $this->db->where($this->table.'.r_i', $chaine); }
		if($statut !=0){ $this->db->where($this->table.'.r_status', $statut); }
		$query = $this->db->get();
		return $query->result();
	}


	public function maj()
	{
		if($this->r_i != 0)
		{
			$this->db->where('r_i', $this->r_i);
			return $this->db->update($this->table,$this);
		}
		else
		{
			return $this->db->insert($this->table,$this);
		}


	}

	public function setStatus($status,$id)
	{
		$data = array(
			'r_status' => $status
		);

		$this->db->where('r_i', $id);
		return $this->db->update($this->table, $data);


	}

	public function count()
	{
		$this->db->count_all($this->table,$this);
	}



}
