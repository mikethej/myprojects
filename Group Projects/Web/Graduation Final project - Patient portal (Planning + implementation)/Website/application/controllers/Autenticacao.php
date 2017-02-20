<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autenticacao extends CI_Controller
{
	var $min_username = 9;
	var $max_username = 9;
	var $min_password = 4;
	var $max_password = 20;

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('Form_validation');
		$this->load->library('DX_Auth');
		$this->load->helper('url');
		$this->load->helper('form');
                $this->load->model('Mymodel');
		date_default_timezone_set("Europe/Lisbon");


	}
	
	function index()
	{
		//$this->login();
                //$this->load->view('formulario_login');
	}
	
        function login()
        {
                if ( ! $this->dx_auth->is_logged_in())
                {
                        $val = $this->form_validation;

                        // Set form validation rules
                        $val->set_rules('username', 'Username', 'trim|required|numeric');
                        $val->set_rules('password', 'Password', 'trim|required');
                        $val->set_rules('remember', 'Manter sessão iniciada', 'integer');


                        if ($val->run() AND $this->dx_auth->login($val->set_value('username'), $val->set_value('password'), $val->set_value('remember')))
                        {
                                // Redirect to homepage
                                $this->load->view('header_utente');
                                $this->load->view('portal_utente');
                        }
                        else
                        {		
                                // Load login page view
                                redirect(index_page(), 'refresh');
                        }
                }
                else
                {
                    redirect(index_page(), 'refresh');
                }
        }
	
	function logout()
	{
	    $this->dx_auth->logout();
            redirect(index_page(), 'refresh');		
	}


	// Used for registering and changing password form validation

    function registo()
	{
		if ( ! $this->dx_auth->is_logged_in())
		{	
			$val = $this->form_validation;
			
			// Set form validation rules
			$val->set_rules('username', 'Numero de Utente', 'trim|required|min_length['.$this->min_username.']|max_length['.$this->max_username.']|callback_username_check|alpha_dash');
			$val->set_rules('password', 'Senha', 'trim|required|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_password]');
			$val->set_rules('confirm_password', 'Confirme a Senha', 'trim|required');
			$val->set_rules('email', 'Email', 'trim|required|valid_email|callback_email_check');
                        $val->set_rules('data_nascimento','Data Nascimento','trim|required');
                        $val->set_rules('nome_completo', 'Nome_Completo', 'trim|required');
                        
                        

                    // Run form validation and register user if it's pass the validation
                    if ($val->run() AND $this->dx_auth->register($val->set_value('username'), $val->set_value('password'), $val->set_value('email'),$val->set_value('nome_completo'),$val->set_value('data_nascimento')))
                    {	
                            // Set success message accordingly
                            if ($this->dx_auth->email_activation)
                            {
                                    $data['auth_message'] = 'Foi registado com sucesso. Verifique o seu email para activar a sua conta.';
                            }
                            else
                            {		
									echo '<br>Foi registado com sucesso.<br>';
									echo 'Vai ser redireccionado em 3 segundos...<br>';
									header('Refresh: 3; URL=https://www.portaldasaude.click/');
                                    }


                    }
                    else
                    {
                            // Load registration page
                            $this->load->view('header');
                            $this->load->view('formulario_registo');
                            //$this->load->view('Auth/register_form');
                    }
            }
            elseif ( ! $this->dx_auth->allow_registration)
            {
                    $data['auth_message'] = 'Registration has been disabled.';
                    $this->load->view($this->dx_auth->register_disabled_view, $data);
            }
            else
            {
                   redirect(index_page(), 'refresh'); 
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

	function change_password()
	{
		// Check if user logged in or not
		if ($this->dx_auth->is_logged_in())
		{			
			$val = $this->form_validation;
			
			// Set form validation
			$val->set_rules('old_password', 'Old Password', 'trim|required|min_length['.$this->min_password.']|max_length['.$this->max_password.']');
			$val->set_rules('new_password', 'New Password', 'trim|required|min_length['.$this->min_password.']|max_length['.$this->max_password.']|matches[confirm_new_password]');
			$val->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required');
			
			// Validate rules and change password
			if ($val->run() AND $this->dx_auth->change_password($val->set_value('old_password'), $val->set_value('new_password')))
			{
				$data['auth_message'] = 'A sua password foi alterada com sucesso.';
				$this->load->view('autenticacao/change_password_success', $data);
                                
			}
			else
			{
                                $this->load->view('header_utente');
				$this->load->view('autenticacao/change_password_form');
			}
		}
		else
		{
			// Redirect to login page
			//$this->dx_auth->deny_access('login');
			redirect('Autenticacao/login');
		}
	}
        
        	function reset_password()
	{
		// Get username and key
		$username = $this->uri->segment(3);
		$key = $this->uri->segment(4);

		// Reset password
		if ($this->dx_auth->reset_password($username, $key))
		{
			$data['auth_message'] = 'You have successfully reset you password, '.anchor(site_url($this->dx_auth->login_uri), 'Login');
			$this->load->view($this->dx_auth->reset_password_success_view, $data);
		}
		else
		{
			$data['auth_message'] = 'Reset failed. Your username and key are incorrect. Please check your email again and follow the instructions.';
			$this->load->view($this->dx_auth->reset_password_failed_view, $data);
		}
	}
        	function recaptcha_check()
	{
		$result = $this->dx_auth->is_recaptcha_match();		
		if ( ! $result)
		{
			$this->form_validation->set_message('recaptcha_check', 'Your confirmation code does not match the one in the image. Try again.');
		}
		
		return $result;
	}
        
        	function activate()
	{
		// Get username and key
		$username = $this->uri->segment(3);
		$key = $this->uri->segment(4);

		// Activate user
		if ($this->dx_auth->activate($username, $key)) 
		{   
                        $this->load->view('header');
			$data['auth_message'] = 'A sua conta foi activada com sucesso. '.anchor(site_url($this->dx_auth->login_uri), 'Login');
			$this->load->view($this->dx_auth->activate_success_view, $data);
                        
		}
		else
		{
                        $this->load->view('header');
			$data['auth_message'] = 'O código de activação que inseriu está errado. Verifique o seu email.';
			$this->load->view($this->dx_auth->activate_failed_view, $data);
		}
	}

}
