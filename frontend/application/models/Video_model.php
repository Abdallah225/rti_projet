<?php

class Video_model extends CI_Model
{

	public $title;
	public $content;
	public $date;

	public $table = 't_video';


	public function getByIdEmission($iemission,$tag=0)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($iemission !=0){$this->db->where($this->table.'.r_iemission', $iemission);}

		$this->db->order_by("r_date", "desc");
		$this->db->limit(5);
		$query = $this->db->get();

		return $query->result();
	}


	public function getVideo($tag,$thematic=0,$emission=0,$limit=20)
	{

		$this->db->select('*');

		$this->db->from($this->table);
		if($tag !=='')
		{
			$this->db->like('r_mots_cle', $tag);
		}


		if($emission !=0){$this->db->where('r_iemission', $emission);};
		if($thematic !=0){$this->db->where('r_ithematique', $thematic);};
		if($tag!=0){$this->db->order_by("r_date", "asc");}
		if($thematic!=0){$this->db->order_by('rand()');};
		$this->db->limit($limit);
		$query = $this->db->get();
		return $query->result();
	}



	public function getByIdEmissionLimit($iemission,$limit,$offset)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if($iemission !=0){$this->db->where($this->table.'.r_iemission', $iemission);}

		$this->db->order_by("r_date", "desc");
		$this->db->limit($offset,$limit);
		$query = $this->db->get();

		return $query->result();
	}

	public function count()
	{
		$this->db->count_all($this->table,$this);
	}


}

