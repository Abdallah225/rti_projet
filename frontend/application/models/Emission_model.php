<?php

class Emission_model extends CI_Model {

	public $title;
	public $content;
	public $date;

	public $table ='t_emission';



	public function get_count_all($statut=0,$thematique=0,$chaine=0)
	{
		/*$this->db->select('r_i');
		$this->db->from($this->table);
		if($thematique !=0){ $this->db->where($this->table.'.r_ithematique', $thematique); }
		if($chaine !=0){ $this->db->where($this->table.'.r_ichaine', $chaine); }
		if($statut !=0){ $this->db->where($this->table.'.r_status', $statut); }
		$query = $this->db->get();*/
		$query =$this->db->query('SELECT `r_i`,`r_nom`,`r_image`,(SELECT COUNT(r_i) as r_videos FROM t_video
 where t_video.r_iemission=t_emission.r_i) as r_videos FROM `t_emission` where `r_ithematique`='.$thematique);
		return $query->num_rows();
	}


	public function getdata($statut=0,$thematique=0,$chaine=0)
	{
		if($thematique!=0)
		{
			$query =$this->db->query('SELECT `r_i`,`r_date`,`r_status`,`r_desc`,`r_nom`,`r_image`,(SELECT COUNT(r_i) as r_videos FROM t_video
 where t_video.r_iemission=t_emission.r_i) as r_videos FROM `t_emission` where `r_ithematique`='.$thematique);

		}
		else
		{

			$query =$this->db->query('SELECT `r_i`,`r_status`,`r_date`,`r_desc`,`r_nom`,`r_image`,(SELECT COUNT(r_i) as r_videos FROM t_video
 where t_video.r_iemission=t_emission.r_i) as r_videos FROM `t_emission`');
		}
		
	/*	$this->db->from($this->table);
		if($thematique !=0){ $this->db->where($this->table.'.r_ithematique', $thematique); }
		if($chaine !=0){ $this->db->where($this->table.'.r_ichaine', $chaine); }
		if($statut !=0){ $this->db->where($this->table.'.r_status', $statut); }*/
		//$query = $this->db->get();
		return $query->result();
	}

	public function getdatapaginate($statut=0,$thematique=0,$chaine=0,$limit=0,$offset=0)
	{

		if($chaine==0)
		{
			$sql = "SELECT r_i,r_nom,r_image,(SELECT COUNT(r_i) as r_videos FROM t_video
 where t_video.r_iemission=t_emission.r_i) as r_videos FROM `t_emission` where r_ithematique=$thematique and r_status=1 limit $limit,$offset";

		}

		if($chaine !=0)
		{
			$sql = "SELECT r_i,r_nom,r_image,(SELECT COUNT(r_i) as r_videos FROM t_video
 where t_video.r_iemission=t_emission.r_i) as r_videos FROM `t_emission` where r_ithematique=$thematique
  and r_status=1 and r_ichaine=$chaine";

		}




	/*$this->db->select('SQL_CALC_FOUND_ROWS *',false);
		$this->db->from($this->table);
		if($thematique !=0){ $this->db->where($this->table.'.r_ithematique', $thematique); }
		if($chaine !=0){ $this->db->where($this->table.'.r_ichaine', $chaine); }
		if($statut !=0){ $this->db->where($this->table.'.r_status', $statut); }
		$this->db->limit($offset,$limit);
		$query = $this->db->get();*/
		$query =$this->db->query($sql);
		return $query->result();
	}


	public function getEmissionById($id)
	{
		$this->db->select ('*');
		$this->db->from($this->table);
		$this->db->where($this->table.'.r_i', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->first_row();

		}
	}

	public function count()
	{
		$this->db->count_all($this->table);
	}

}
