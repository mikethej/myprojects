<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estatistica extends CI_Controller
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
		$this->estatistica();
	}

	/* End of Callback function */

	function estatistica() /* Muda para a view estatistica */
	{
		$this->load->model('Myfunction');
		$data['score'] = $this->Myfunction->getallscores();
		$this->load->view('estatistica', $data);
	}

}
?>
