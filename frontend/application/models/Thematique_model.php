<?php

class Thematique_model extends CI_Model {

    public $r_i;
    public $r_description;
    public $r_libelle;
    private $table ='t_thematique';



    public function get_all_entry()
    {
        $this->db->select('*');
        $query = $this->db->get($this->table);

        $this->db->order_by('r_position', 'DESC');
        return $query->result();
    }


    public function getBystatus($statut=0,$id=0)
    {
        $this->db->select('*');
        $this->db->from($this->table);
		if($statut !=0){ $this->db->where($this->table.'.r_status', $statut); }
		if($id !=0){ $this->db->where($this->table.'.r_i', $id); }
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
			$this->r_status = 1;
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
