<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 11/11/2018
 * Time: 02:33
 */
class Slider_model extends CI_Model
{
	public $table ='t_slide';
	public function getdata($statut=0,$chaine=0)
	{
		$this->db->select('*');
		$this->db->from($this->table);

		if($chaine !=0){ $this->db->where($this->table.'.r_i', $chaine); }
		if($statut !=0){ $this->db->where($this->table.'.r_status', $statut); }
		$query = $this->db->get();
		return $query->result();
	}
	public function count()
	{
		$this->db->count_all($this->table,$this);
	}


}
