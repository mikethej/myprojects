<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regras extends CI_Controller
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
		$this->regras();
	}

	function regras()/* Muda para a view regras */
	{
		$this->load->view('regras');
	}
}
?>

