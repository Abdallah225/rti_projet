<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 08/11/2018
 * Time: 06:14
 */
require_once(APPPATH . 'third_party\gtag.php'); 


class Video  extends CI_Controller
{
	public function getByTag()
	{
		$tag = file_get_contents('php://input');

		$this->load->model('Video_model');
		$retour = $this->Video_model->getVideo($tag,0,0);

		$this->status='200';
		json_output($this->status,$retour);
	}

	public function getByThematic($thematic)
	{
		$this->load->model('Video_model');
		$retour = $this->Video_model->getVideo(0,$thematic);
		$this->status='200';
		json_output($this->status,$retour);
	}


	public function getByEmission($emission)
	{
		$this->load->model('Video_model');
		$retour = $this->Video_model->getVideo(0,0,$emission,100);
		$this->status='200';
		json_output($this->status,$retour);
	}



}
