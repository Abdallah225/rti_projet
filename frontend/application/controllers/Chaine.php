<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 08/11/2018
 * Time: 04:12
 */
require_once(APPPATH . 'third_party\gtag.php'); 

class Chaine  extends CI_Controller
{
	private $require_field = 'Donnees requises manquante';
	private $error_sys = 'Une erreur est survenu';
	private $error_data_already_existe = 'Les informations entrees existe deja ,merci de vous connecter si vous etes deja inscris';
	private $error_data_already_existe_code = -98;
	private $error_login_pass   ='Veuillez vérifier vos acces';



	private $error_sys_code = -100;
	private $require_field_code = '-99';
	private $good_code = 200;
	private $bad_code = 500;
	private $bad_status = 500;


	public function index()
	{
		$this->load->model('Chaine_model');

		$retour = $this->Chaine_model->getdata(0,0);

		$data['chaine'] = $retour;
		$data['secure'] =1;
		$data['title']  ='Direct';
		$this->load->view('public/header',$data);
		$this->load->view('public/chaine',$data);
		$this->load->view('public/footer',$data);
	}   
	public function get()
	{
		$this->load->model('Chaine_model');

		$retour = $this->Chaine_model->getdata(1,0);
		$this->status='200';
		json_output($this->status,$retour);
	}

	public function maj()
	{
		$params = json_decode(file_get_contents('php://input'), FALSE);
		if(!isset($params->libelle) or !isset($params->url))
		{
			$status = $this->bad_code;
			$error = $this->bad_code;
			$message = $this->require_field;
			GOTO _TERMINER;
		}

		$session = $this->input->get_request_header('session', TRUE);

		if(!isset($session) or $session=='')
		{
			$status = $this->bad_code;
			$error = $this->bad_status;
			$message = $this->require_field_code;;
			GOTO _TERMINER;
		}


		$this->load->model('Session_model');
		if($this->Session_model->verif($session)==-1)
		{
			$status = 500;
			$error = 500;
			$message = 'Session expiré';
			GOTO _TERMINER;
		}



		$this->load->model('Chaine_model');
		$this->Chaine_model->r_libelle 		= $params->libelle;
		$this->Chaine_model->r_description 	= $params->description;
		$this->Chaine_model->r_uri 			= $params->url;
		$this->Chaine_model->r_i 			= $params->i;

		if($this->Chaine_model->maj() !=1)
		{
			$status = $this->bad_status;
			$error = $this->bad_code;
			$message = $this->error_sys;
			GOTO _TERMINER;
		}




		$error = $this->good_code;
		$status = $this->good_code;
		$message = 'Terminer avec succès';
		_TERMINER:

		json_output($status, array('status' => $error, 'message' => $message));

	}

	public function setStat($id,$status)
	{
		if(!isset($status) or !isset($id))
		{
			$status = $this->bad_code;
			$error = $this->bad_code;
			$message = $this->require_field;
			GOTO _TERMINER;
		}

		$session = $this->input->get_request_header('session', TRUE);

		if(!isset($session) or $session=='')
		{
			$status = $this->bad_code;
			$error = $this->bad_status;
			$message = $this->require_field_code;;
			GOTO _TERMINER;
		}


		$this->load->model('Session_model');
		if($this->Session_model->verif($session)==-1)
		{
			$status = 500;
			$error = 500;
			$message = 'Session expiré';
			GOTO _TERMINER;
		}

		$this->load->model('Chaine_model');
		if($this->Chaine_model->setStatus($status,$id) !=1)
		{
			$status = $this->error_sys_code;
			$error = $this->error_sys_code;
			$message = $this->error_sys;;
			GOTO _TERMINER;
		}

		$error = $this->good_code;
		$status = $this->good_code;
		$message = 'Terminer avec succès';


		_TERMINER:
		json_output($status, array('status' => $error, 'message' => $message));
	}




}
