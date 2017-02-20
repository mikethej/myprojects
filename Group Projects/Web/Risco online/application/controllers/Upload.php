<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}


	public function upload(){
		$config = array(
			'upload_path' => "http://appserver.di.fc.ul.pt/~asw45103/aula_codeigniter/images/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
		);

		$this->load->library('upload', $config);

		if($this->upload->do_upload()) {
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_success',$data);
		}

		else {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_error', $error);
		}
	}

	public function upload_error(){
		$this->load->view('upload_error', array('error' => ' ' ));
	}
}
?>
