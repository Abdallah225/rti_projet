<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 01/02/2019
 * Time: 05:57
 */

class Admin extends CI_Controller
{
	private $require_field = 'Donnees requises manquante';
	private $error_sys = 'Une erreur est survenu';
	private $error_data_already_existe = 'Les informations entrees existe deja ,merci de vous connecter si vous etes deja inscris';
	private $error_data_already_existe_code = -98;
	private $error_login_pass = 'Veuillez vérifier vos acces';


	private $error_sys_code = -100;
	private $require_field_code = '-99';
	private $good_code = 200;
	private $bad_code = 500;
	private $bad_status = 500;
	public function index($id=0,$status=0)
	{

		$method = $this->input->server('REQUEST_METHOD');
		$this->load->model('Admin_model');
		$params = json_decode(file_get_contents('php://input'), FALSE);


		switch ($method) {
			case 'GET':
				$error = $this->good_code;
				$status = $this->good_code;
				$message =$this->Admin_model->liste();
				GOTO _TERMINER;
				break;
			case 'PUT':
				if (!isset($params->r_login) or !isset($params->r_pass) or !isset($params->r_level)
					or !isset($params->r_mail) or !isset($params->r_nom_prenoms)) {
					$status = $this->bad_code;
					$error = $this->bad_code;
					$message = $this->require_field;
					GOTO _TERMINER;
				}
				$this->Admin_model->r_login = $params->r_login;
				$this->Admin_model->r_pass = $params->r_pass;
				$this->Admin_model->r_level = $params->r_level;
				$this->Admin_model->r_mail = $params->r_mail;
				$this->Admin_model->r_nom_prenoms = $params->r_nom_prenoms;
				$retour = $this->Admin_model->create();

				$error =$retour->error;
				$status = $retour->status;
				$message = $retour->message;
				GOTO _TERMINER;
				break;
			case 'DELETE':
				$retour = $this->Admin_model->setStat($params->r_status,$params->r_i);
				$error = $retour->error;
				$status = $retour->status;
				$message = $retour->message;
				GOTO _TERMINER;
				break;
		}
		_TERMINER:
		json_output($status, array('status' => $error, 'message' => $message));



		}

}
