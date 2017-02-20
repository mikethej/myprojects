<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacao extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		
		$this->load->library('Form_validation');
		$this->load->library('DX_Auth');
		
		$this->load->helper('url');
		$this->load->helper('form');
		date_default_timezone_set("Europe/Lisbon");
	

	}
	
	function index()
	{
		$this->login();
	}
	
	function login()
	{
		
		if ( ! $this->dx_auth->is_logged_in())
		{
			$val = $this->form_validation;
			
			// Set form validation rules
			$val->set_rules('username', 'Username', 'trim|required');
			$val->set_rules('password', 'Password', 'trim|required');
			$val->set_rules('remember', 'Manter sessão iniciada', 'integer');

				
			if ($val->run() AND $this->dx_auth->login($val->set_value('username'), $val->set_value('password'), $val->set_value('remember')))
			{
				// Redirect to homepage
				//redirect('', 'location');
				$this->load->model('Myfunction');
				$data['games'] = $this->Myfunction->getallgames();
				$this->load->view('home', $data);

			}
			else
			{		
				// Load login page view
				$this->load->model('Myfunction');
				$data['score'] = $this->Myfunction->getallscores();
				$this->load->view("autenticacao/formulario_login", $data);
			}
		}
		else
		{
			$this->load->model('Myfunction');
			$data['games'] = $this->Myfunction->getallgames();
			$this->load->view('home', $data);
		}
	}
	
	function logout()
	{
		$this->dx_auth->logout();
		$this->load->model('Myfunction');
		$data['score'] = $this->Myfunction->getallscores();
		$this->load->view('autenticacao/formulario_login', $data);
	}
	


	// Used for registering and changing password form validation
	var $min_username = 4;
	var $max_username = 20;
	var $min_name = 4;
	var $max_name = 20;
	var $min_password = 4;
	var $max_password = 20;

	
	function registo()
	{
		if ( ! $this->dx_auth->is_logged_in())
		{	
			$val = $this->form_validation;
			
			// Set form validation rules
			$val->set_rules('username', 'Username', 'trim|required|min_length['.$this->min_username.']|max_length['.$this->max_username.']|callback_username_check|alpha_dash');
			$val->set_rules('password', 'Password', 'trim|required|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_password]');
			$val->set_rules('confirm_password', 'Confirme a Password', 'trim|required');
			$val->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
			

			// Run form validation and register user if it's pass the validation
			if ($val->run() AND $this->dx_auth->register($val->set_value('username'), $val->set_value('password'),$val->set_value('email')))
			{	
				
				// Load registration success page
				$this->load->model('Myfunction');
				$this->Myfunction->insertplayer($this->input->post("name"),$val->set_value('username'));
				$data['score'] = $this->Myfunction->getallscores();
				$this->load->view('autenticacao/formulario_login', $data);
			}
			else
			{
				// Load registration page
				$this->load->view('autenticacao/formulario_registo');
			}
		}
		else
		{

			$this->load->model('Myfunction');
			$data['games'] = $this->Myfunction->getallgames();
			$this->load->view('home', $data);
		}
	}
	


	/* Callback function */
	
	function username_check($username)
	{
		$result = $this->dx_auth->is_username_available($username);
		if ( ! $result)
		{
			$this->form_validation->set_message('username_check', 'O username já está registado. Por favor escolha outro username.');
		}
				
		return $result;
	}

	function email_check($email)
	{
		$result = $this->dx_auth->is_email_available($email);
		if ( ! $result)
		{
			$this->form_validation->set_message('email_check', 'O email já está registado. Por favor escolha outro endereço!');
		}
				
		return $result;
	}

}
?>
