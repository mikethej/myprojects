<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
		 
	function __construct() {
		parent::__construct();
		
		#$this->load->library('Form_validation');
		#$this->load->library('DX_Auth');
		$this->load->helper('url');
		$this->load->helper('form');
                $this->load->library('DX_Auth');
         
		date_default_timezone_set("Europe/Lisbon");
                if(!$this->dx_auth->is_logged_in()){
                    $this->load->view('header');
                }  else {
                    $this->load->view('header_utente');
                }
	}
	
	public function index()
	{
            if(!$this->dx_auth->is_logged_in()){
                $this->load->view('homepage');
            }  else {
                $this->load->view('portal_utente');
            }
	}
        public function contact(){

            $this->load->view('contact-us');
        }
        public function about(){
            $this->load->view('about-us');
        }
        public function services(){

            $this->load->view('services');
        }
        public function estabelecimentos(){
            $this->load->view('estabelecimentos');
        }
        
        function contact_us(){
            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'telefone' => $this->input->post('telefone'),
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message')
            );
            
            if(!empty($data['nome'])){  
                $this->Mymodel->contactar_equipa($data);
                echo "<script type='text/javascript'>alert('Menssagem enviada com sucesso!');</script>";
                redirect(site_url('index.php/'.uri_string()),'refresh');
            }
        }
        
}
