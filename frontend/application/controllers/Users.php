<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . 'third_party\gtag.php'); 

class Users extends CI_Controller
{

	private $data_show;

	function __construct()
	{
		parent::__construct();
		$this->data_show = new stdClass();
	}

	public function index()
	{
		$this->load->view("header.php");
	}


	public function register()
	{
		$params = json_decode(file_get_contents('php://input'), false);

		if($params->nom_prenom == '' or null)
		{
			$this->status='200';
			$this->contenu=array('status'=>'400','message'=>'Merci de saisir votre nom & prénoms');
		}


		if($params->email == '' or null)
		{
			$this->status='200';
			$this->contenu=array('status'=>'400','message'=>'Merci de saisir votre adresse mail');
		}

		if($params->pass1 == '' or null)
		{
			$this->status='200';
			$this->contenu=array('status'=>'400','message'=>'Merci de saisir votre mot de passe');
		}


		if(($params->pass1) != ($params->pass2))
		{
			$this->status='200';
			$this->contenu=array('status'=>'400','message'=>'Veuillez confirmer votre mot de passe');
		}

		$salt = rand_string(5);
		$this->load->model('User_model');
		$this->User_model->r_nom_prenom=$params->nom_prenom;
		$this->User_model->r_email=$params->email;
		$this->User_model->r_mdp=password_hash($params->pass1,PASSWORD_BCRYPT);
		//$this->User_model->r_mdp=password_hash($params->pass1.$salt,PASSWORD_BCRYPT);
		$this->User_model->r_salt=$salt;
		$this->User_model->r_form_id=rand_string(15);

		$retour = $this->User_model->maj_user();


		if($retour==-1)
		{
			$this->status='200';
			$this->contenu=array('status'=>'400','message'=>'Un compte avec ces données existe déjà merci de vous connecter ou vérifier vos informations');
		}


		switch ($retour) {
			case -1:
				$this->status='200';
				$this->contenu=array('status'=>'400','message'=>'Un compte avec ces données existe déjà merci de vous connecter ou vérifier vos informations');
				break;
			case 0:
				$this->status='200';
				$this->contenu=array('status'=>'400','message'=>' déjà merci de vous connecter ou vérifier vos informations');

			default:
				$this->status='200';
				$this->contenu=array('status'=>'200','message'=>' Votre inscription s\'est déroulée avec succès');
		}


		json_output($this->status,$this->contenu);

	}

public function login()
{


	$params = json_decode(file_get_contents('php://input'), false);

	if($params->user == '' or null)
	{
		$this->status='200';
		$this->contenu=array('status'=>'400','message'=>'Merci de saisir votre mail ');
	}


	if($params->mdp == '' or null)
	{
		$this->status='200';
		$this->contenu=array('status'=>'400','message'=>'Merci de saisir votre mot de passe');
	}

	$this->load->model('User_model');

	$retour = $this->User_model->login($params->user,$params->mdp);
	/*switch ($retour) {
		case -1:
			$this->status='400';
			$this->contenu=array('status'=>'400','message'=>'Votre compte est désactivé');
			break;
		case 0:
			$this->status='400';
			$this->contenu=array('status'=>'400','message'=>' Login / mot de passe incorecte');

		default:
			$this->status='200';
			$this->contenu=array('status'=>'200','message'=>$retour);
	}*/

	json_output(200,$retour);

}


public function logout()
{

	$array_items = array('i', 'nom_prenom');

	$this->session->unset_userdata($array_items);

	$this->session->set_userdata('');
	unset($_SESSION['session']);
	$this->load->view('public/out');

}

public function slider()
{
	$this->load->view('public/slider');
}






}
