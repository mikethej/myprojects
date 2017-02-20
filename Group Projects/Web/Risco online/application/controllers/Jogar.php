<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jogar extends CI_Controller
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
		$this->home();
	}

	/* End of Callback function */

	function home() /* Muda para a view home */
	{

		$this->load->model('Myfunction');
		$data['games'] = $this->Myfunction->getallgames();
		$this->load->view('home', $data);
	}

	function create()
	{
		
		$this->load->model('Myfunction'); 
		$some = $this->Myfunction->creategame($this->input->post("info"), $this->dx_auth->get_user_id());
		$data['creator'] = $this->Myfunction->playerinsidegame_creator($some);
		$data['partic'] = $this->Myfunction->playerinsidegame_parti($some);
		$this->load->view('insidegame', $data);
		
		
	}

	function gotogame()
	{	
		
		$this->load->model('Myfunction');
		$this->Myfunction->playergame($this->input->get('game_id'),$this->dx_auth->get_user_id());
		$data['creator'] = $this->Myfunction->playerinsidegame_creator($this->input->get('game_id'));
		$data['partic'] = $this->Myfunction->playerinsidegame_parti($this->input->get('game_id'));
		$this->load->view('insidegame', $data);
		
	}
	function outofgame()
	{
		$this->load->model('Myfunction');
		$this->Myfunction->gameout($this->input->get('game_id'),$this->dx_auth->get_user_id());
	}



}

?>
