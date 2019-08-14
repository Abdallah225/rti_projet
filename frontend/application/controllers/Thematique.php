<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 23/02/2018
 * Time: 15:45
 */
require_once(APPPATH . 'third_party\gtag.php'); 

class Thematique  extends CI_Controller
{
public $retour;
public $status;
public $contenu;

	private $require_field = 'Donnees requises manquantes';
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

		$this->load->model('Thematique_model');
		$retour = $this->Thematique_model->getBystatus(1);
		$this->status='200';
		json_output($this->status,$retour);

    }



	public function maj()
	{
		$params = json_decode(file_get_contents('php://input'), FALSE);
		if(!isset($params->libelle))
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



		$this->load->model('Thematique_model');
		$this->Thematique_model->r_libelle 		= $params->libelle;
		$this->Thematique_model->r_description 		= $params->description;
		$this->Thematique_model->r_i 			= $params->i;

		if($this->Thematique_model->maj() !=1)
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


}
