<?php
/**
 * Created by IntelliJ IDEA.
 * User: alex.beda
 * Date: 05/12/2018
 * Time: 00:00
 */
require_once(APPPATH . 'third_party\gtag.php'); 

Class Manager extends CI_Controller
{



	private $require_field = 'Donnees requises manquante';
	private $error_sys = 'Une erreur est survenu';
	private $error_data_already_existe = 'Les informations entrees existe deja ,merci de vous connecter si vous etes deja inscris';
	private $error_data_already_existe_code = -98;
	private $error_login_pass   ='Veuillez vérifier vos acces';
	private $message   ;



	private $error_sys_code = -100;
	private $require_field_code = '-99';
	private $good_code = 200;
	private $bad_code = 500;
	private $bad_status = 500;


	function chanels($i=0)
	{
		include 'traitements/chaines.php';
	}


function thematic($i)
{
	include 'traitements/thematic.php';
}


	function Stats()
	{

		$output =  new \stdClass();
		$outputafrray= array();
		$output->libelle = 'thematiques';
		$output->value = $this->db->count_all('t_thematique');

		array_push($outputafrray,$output);
		$output = null;
		$output =  new \stdClass();


		$output->libelle = 'chaines';
		$output->value = $this->db->count_all('t_chaine');

		array_push($outputafrray,$output);
		$output = null;
		$output =  new \stdClass();



		$output->libelle = 'émissions';
		$output->value = $this->db->count_all('t_emission');

		array_push($outputafrray,$output);
		$output = null;
		$output =  new \stdClass();




		$output->libelle = 'programmes';
		$output->value = $this->db->count_all('t_programme');

		array_push($outputafrray,$output);
		$output = null;
		$output =  new \stdClass();




		$output->libelle = 'utilisateurs';
		$output->value = $this->db->count_all('t_utilisateur');

		array_push($outputafrray,$output);
		$output = null;
		$output =  new \stdClass();


		$output->libelle = 'videos';
		$output->value = $this->db->count_all('t_video');

		array_push($outputafrray,$output);
		$output = null;
		$output =  new \stdClass();

		$output->libelle = 'Visite';
		$output->value = '0';

		array_push($outputafrray,$output);
		$output = null;
		$output =  new \stdClass();



		return $outputafrray;

	//	json_output(200, array('status' => 200, 'message' => $outputafrray));

	}
	public function index()
	{
		$this->load->view('manager/login');

	}


	public function login()
	{
		$params = json_decode(file_get_contents('php://input'), FALSE);
		//$blaster = $this->input->get_request_header('SESSION', TRUE);

		if ($params->pass == '' or $params->user == null or $params->nav_info==null or $params->ip==null) {
			$status = $this->bad_status;
			$error = $this->require_field_code;
			$message = $this->require_field ;
			GOTO _TERMINER;
		}

		$this->load->model('Admin_model');
		$this->Admin_model->r_login =$params->user;
		$this->Admin_model->r_pass  =$params->pass;
		$r=$this->Admin_model->login($params->nav_info,$params->ip);




		$status = $this->good_code;
		$error = $this->good_code;
		$message = $r;


		_TERMINER:
		json_output($status, array('status' => $error, 'message' => $message));

	}

	public function cret()
	{
		$params = json_decode(file_get_contents('php://input'), FALSE);

		$this->load->model('Admin_model');
		$this->Admin_model->r_login = $params->login;
		$this->Admin_model->r_pass = $params->mdp;
		$this->Admin_model->r_level =1;
		$this->Admin_model->r_mail =$params->mail;
		$this->Admin_model->r_nom_prenoms =$params->nom_prenoms;
		echo $this->Admin_model->maj();
	}

	public function Admin()
	{

		$this->load->model('Admin_model');
		$this->status='200';
		json_output($this->status,$this->Admin_model->liste());
	}





	public function dashoard()
	{
		if(!$this->session->has_userdata('session') or $this->session->has_userdata('session')===null)
		{
			echo 'No Allow Here';
			echo '<script>window.setTimeout(function(){

						window.location.href=\''. site_url().'/Manager\';

					}, 2000);</script>';
			exit;
		}


		$data['stats']  = $this->Stats();

		$this->load->view('manager/header');
		$this->load->view('manager/pages/dashboard',$data);
		$this->load->view('manager/footer');

		//print_r($this->session->session);
	}
	public function show($page = 'dashboard')

	{

		if(!$this->session->has_userdata('session') or $this->session->has_userdata('session')===null)
		{
			echo 'No Allow Here';
			echo '<script>window.setTimeout(function(){

						window.location.href=\''. site_url().'/Manager\';

					}, 2000);</script>';
			exit;
		}


		if ( ! file_exists(APPPATH.'views/manager/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			//show_404();
			$this->load->view('manager/pages/404');
			echo APPPATH.'views/manager/pages/'.$page.'.php';

		}
		else
		{
			$data['title'] = ucfirst($page); // Capitalize the first letter

			$this->load->view('manager/header', $data);
			$this->load->view('manager/pages/'.$page, $data);
			$this->load->view('manager/footer', $data);
		}

	}

	public function maj()
	{
		$params = json_decode(file_get_contents('php://input'), FALSE);
		$this->load->model('Admin_model');
		$this->Admin_model->r_login = $params->login;
		$this->Admin_model->r_pass = $params->mdp;
		$this->Admin_model->r_level =1;
		$this->Admin_model->r_mail =$params->mail;
		$this->Admin_model->r_nom_prenoms =$params->nom_prenoms;

		$session = $this->input->get_request_header('session', TRUE);

		if(!isset($session) or $session=='')
		{
			$status = $this->bad_code;
			$error = $this->bad_status;
			$message = $this->require_field_code;;
			GOTO _TERMINER;
		}


		$this->load->model('Admin_model');
		if($this->Admin_model->maj()==-1)
		{
			$status = 500;
			$error = 500;
			$message = 'Session expiré';
			GOTO _TERMINER;
		}





		$error = $this->good_code;
		$status = $this->good_code;
		$message = 'Terminer avec succès';
		_TERMINER:

		json_output($status, array('status' => $error, 'message' => $message));

	}







}
