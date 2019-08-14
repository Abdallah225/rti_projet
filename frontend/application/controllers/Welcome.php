<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'third_party\gtag.php'); 

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->model('Slider_model');

		$retour = $this->Slider_model->getdata(0,0);
		$data['slidercontent'] = $retour;
		$data['title'] = 'Accueil';

		$this->load->view('public/header',$data);
		$this->load->view('public/welcome',$data);
		$this->load->view('public/footer');
	}




}
