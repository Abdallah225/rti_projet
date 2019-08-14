<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 05/12/2018
 * Time: 00:05
 */
Class Session_model extends  CI_Model
{

	public $r_session ;
	public $r_ip ;
	public $r_info_nav ;
	public $r_iuser ;
	private $table ='t_session';

	public function creat()
	{
		$this->r_session = rand_string(15);
		if($this->db->insert($this->table,$this))
		{
			return $this->r_session;
		}
		else
		{
			return -99;
		}
	}

	public function verif($session)
	{
		$this->db->select($this->table . '.r_i as r_i');
		$this->db->select($this->table . '.r_date as r_date');
		$this->db->select($this->table . '.r_expire as r_expire');
		$this->db->from($this->table);
		$this->db->where('r_session', $session);
		$query = $this->db->get();
		if ($query->num_rows() == 0)
		{
			return -1;
		}
		else
		{
			return 1;
		}
	}

}
