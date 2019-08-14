<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 08/11/2018
 * Time: 13:58
 */

require_once(APPPATH . 'third_party\gtag.php'); 


class Programme  extends CI_Controller
{





	public function aindex($j=0)
	{
		$date = new DateTime();

		if($j !=0)
		{
			$date = $date->modify("$j day");
		}

		$this->load->model('Programe_model');
		$retour = $this->Programe_model->getByDate($date->format("Y-m-d"));
		$this->status='200';
		json_output($this->status,$retour);

	}


	public function index($j=0)
	{

		$date = new DateTime();

		if($j !=0)
		{
			$date = $date->modify("$j day");
		}

		$this->load->model('Programe_model');
		$retour = $this->Programe_model->getByDate($date->format("Y-m-d"));


		$data['retour'] = $retour;




		$this->load->view('public/header');
		$this->load->view('public/programme',$data);

		$this->load->view('public/footer');
	}


}
