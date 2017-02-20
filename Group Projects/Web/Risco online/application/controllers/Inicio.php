<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Inicio.php (1a Versão)
//            - Guardar em controllers/
//            - Controlador das páginas iniciais
// ===========================================================================

class Inicio extends CI_Controller {

  //função chamada por omissão
  public function index()
  {
    //faz o load da view
    $this->load->view('homefina');
    $this->load->helper('url');
  }

}

?>
