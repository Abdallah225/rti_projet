<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 23/02/2018
 * Time: 15:45
 */
require_once(APPPATH . 'third_party\gtag.php'); 

class Emission  extends CI_Controller
{
	public $retour;
	public $status;
	public $contenu;

	public function index($thematic=0,$chaine=0)
	{

		$this->load->model('Thematique_model');
		$retour = $this->Thematique_model->getBystatus(0,$thematic);



		$data['thematic'] = $thematic;
		$data['chaine'] = $chaine;
		if(count($retour) > 0)
		{
			$data['title'] =$retour[0]->r_libelle;
			$data['metas'] =$retour[0]->r_description;
		}



		$this->load->view('public/header',$data);
		//$this->load->view('public/emission',$data);
		$this->load->view('public/thematic',$data);
		$this->load->view('public/footer',$data);
	}


	public function aindex($thematic=0,$chaine=0)
	{




		$this->load->model('Emission_model');
		$retour = $this->Emission_model->getdata(1,$thematic,$chaine);
		$this->status='200';
		json_output($this->status,$retour);
	}


	public function bindex($thematic=0,$chaine=0,$current=0)
	{


		$perpage = 20;
		$this->load->model('Emission_model');
		$total = $this->Emission_model->get_count_all(1,$thematic,$chaine);
		$this->status='200';
		$offset ='';
		$limit ='';
		if($current==0)
		{

			$offset = 100;
			$limit = 0;

		}
		else{
			$limit = $perpage*$current;
			$offset = $perpage;
		}


		$this->load->model('Emission_model');
		$donne = $this->Emission_model->getdatapaginate(1,$thematic,$chaine,$limit,$offset);

		//$reqq = 'SELECT SQL_CALC_FOUND_ROWS * FROM t_emission '.$limit.' , '.$offset;

		$object = new stdClass();
		$object->total_row = ceil($total/$perpage);


		$object->next = $current+1;
		$prev ='';
	if($current-1 ==-1)
	{
	$prev=0;
}
else
{
	$prev = $current-1;
}
		$object->prev = $prev;
		$object->data = $donne;
		json_output($this->status,$object);

	}

	public function getbyidA($id)
	{
		$this->load->model('Emission_model');
		$this->load->model('Video_model');
		$emission = $this->Emission_model->getEmissionById($id);
		$video = $this->Video_model->getByIdEmission($id);


		$object = new stdClass();
		$object->emission = $emission;
		$object->video = $video;


		json_output(200,$object);
	}



public function getbyid($thematic,$titre,$id)
{

	$this->load->model('Emission_model');
	$this->load->model('Video_model');
	$emission = $this->Emission_model->getEmissionById($id);
	$video = $this->Video_model->getByIdEmission($id);



	$object = new stdClass();
	$object->emission = $emission;
	$object->video = $video;

	$data['thematic'] = $thematic;
	$data['thematic_id'] = $titre;
	$data['idemission'] = $id;
	$data['data'] = $object;
	$data['secure'] = 1;
	$data['title'] = $emission->r_nom;
	$data['metas'] = $emission->r_desc;
	$data['isemission'] = 1;

	$this->load->view('public/header',$data);
	$this->load->view('public/videoemission',$data);
	$this->load->view('public/footer',$data);
}



public function getByEmissionLimit($id,$limit)
{
	$this->load->model('Video_model');

	$offset = 5;
	if($limit > 0)
	{
		$limit = $limit*$offset;
	}



	$video = $this->Video_model->getByIdEmissionLimit($id,$limit,$offset);
	echo json_encode($video);
}



public function test()
{
	$this->load->view('public/header');
	//$this->load->view('public/videoemission');
	$this->load->view('public/footer');
}






}
