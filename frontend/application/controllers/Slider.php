<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 11/11/2018
 * Time: 02:31
 */
require_once(APPPATH . 'third_party\gtag.php'); 

class Slider extends CI_Controller
{
	public function index()
	{
		$this->load->model('Slider_model');

		$retour = $this->Slider_model->getdata(0,0);
		$this->status='200';
		json_output($this->status,$retour);
	}
}
