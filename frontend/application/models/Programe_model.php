<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 08/11/2018
 * Time: 16:23
 */


class Programe_model extends CI_Model
{
	public $table ='t_programme';

	public function getByDate($date)
	{
		$this->db->from($this->table);
		if($date !=0){ $this->db->where($this->table.'.r_date', $date); }
		$this->db->order_by("r_date","desc");
		$query = $this->db->get();
		return $query->result();
	}


	public function count()
	{
		$this->db->count_all($this->table,$this);
	}

}
