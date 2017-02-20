<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historico extends CI_Controller
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
		$this->historico();
	}
	
	function historico()/* Muda para a view historico */
	{	
		$this->load->model('Myfunction');
		$data['hist']= $this->Myfunction->hist($this->dx_auth->get_user_id());
		$this->load->view('historico', $data);
	}
	
}
?>
