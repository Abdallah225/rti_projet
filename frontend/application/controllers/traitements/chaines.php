<?php
$session = $this->input->get_request_header('session', TRUE);

if(!isset($session) or $session=='')
{
	$this->status=$this->bad_code;
	// $this->message  = $this->require_field_code;
	$this->message  = $this->require_field_code;
	GOTO _TERMINER;
}

$this->load->model('Session_model');
if($this->Session_model->verif($session)==-1)
{
	$this->status=$this->bad_code;
	$this->message  =  'Session expiré';;
	GOTO _TERMINER;
}

$this->load->model('Chaine_model');
switch ($this->input->method(TRUE)) {
	case 'GET':

		$retour = $this->Chaine_model->getdata(1,0);
		$this->status='200';
		$this->message  = $retour;
		break;
	case 'POST':
		$params = json_decode(file_get_contents('php://input'), FALSE);
		if(!isset($params->libelle) or !isset($params->url))
		{
			$this->status=$this->bad_code;
			$this->message  =  $this->require_field;
			GOTO _TERMINER;
		}

		$this->Chaine_model->r_libelle 		= $params->libelle;
		$this->Chaine_model->r_description 	= $params->description;
		$this->Chaine_model->r_uri 			= $params->url;
		$this->Chaine_model->r_i 			= $params->i;

		if($this->Chaine_model->maj() !=1)
		{
			$this->status=$this->bad_code;
			$this->message  = $this->error_sys;
			GOTO _TERMINER;
		}

		$this->status	=	$this->good_code;
		$this->message  = 	'Terminer avec succès';

		break;
	case 'PUT':
		$params = json_decode(file_get_contents('php://input'), FALSE);
		if(!isset($params->libelle) or !isset($params->url))
		{
			$this->status=$this->bad_code;
			$this->message  =  $this->require_field;
			GOTO _TERMINER;
		}

		$this->Chaine_model->r_libelle 		= $params->libelle;
		$this->Chaine_model->r_description 	= $params->description;
		$this->Chaine_model->r_uri 			= $params->url;
		$this->Chaine_model->r_i 			= $params->i;

		if($this->Chaine_model->maj() !=1)
		{
			$this->status=$this->bad_code;
			$this->message  = $this->error_sys;
			GOTO _TERMINER;
		}

		$this->status	=	$this->good_code;
		$this->message  = 	'Terminer avec succès';

		break;
	case 'DELETE':
		if($this->Chaine_model->setStatus(-1,$i) !=1)
		{
			$this->status=$this->bad_code;
			$this->message  = $this->error_sys;
			GOTO _TERMINER;
		}

		$this->status	=	$this->good_code;
		$this->message  = 	'Terminer avec succès';
}
_TERMINER:
json_output($this->status, array( 'contenu' => $this->message ));
