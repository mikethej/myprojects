<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller
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
	
	public function index()
	{
		$this->perfil();
	}

	
	function perfil() 
	{	
		$this->load->model('Myfunction');
		$data['perfil'] = $this->Myfunction->getperfil($this->dx_auth->get_user_id());
		$this->load->view('perfil',$data);
	}
}
?>
