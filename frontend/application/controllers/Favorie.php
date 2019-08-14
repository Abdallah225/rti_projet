<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 31/01/2019
 * Time: 00:44
 */
require_once(APPPATH . 'third_party\gtag.php'); 

Class Favorie extends CI_Controller
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

	function index($user=0)
	{
		$method =  $this->input->server('REQUEST_METHOD');

		$this->load->model('Favorie_model');

		switch ($method) {
			case 'POST':
				echo "i égal 0";
				break;
			case 'GET':
				$retour = $this->Favorie_model->get($user);

				$status = $retour->status;
				$error = $retour->error;
				$message = $retour->message;
				GOTO _TERMINER;
				break;
			case 'PUT':
				$params = json_decode(file_get_contents('php://input'), FALSE);
				if(!isset($params->r_iuser) or !isset($params->r_iemission))
				{
					$status = $this->bad_code;
					$error = $this->bad_code;
					$message = $this->require_field;
					GOTO _TERMINER;
				}
				$this->Favorie_model->r_iuser=$params->r_iuser;
				$this->Favorie_model->r_iemission=$params->r_iemission;
				$retour = $this->Favorie_model->maj();

					$status = $retour->status;
					$error = $retour->error;
					$message = $retour->message;
					GOTO _TERMINER;
				break;
		}

		_TERMINER:

		json_output($status, array('status' => $error, 'message' => $message));
	}
}
