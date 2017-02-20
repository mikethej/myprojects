<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - Inserir.php (2a versão)
//            - Guardar em controllers/
//            - Controlador de Inserir Produtos
// ===========================================================================

class Inserir extends CI_Controller {

   //função chamada por omissão
   public function index()
   {
    //vai buscar o input via get no termo 'designacao'.   
    $termo_inserir = $this->input->get("designacao");

    if($termo_inserir != ""){
      //se o termo de pesquisa não é vazio a pesquisa é feita. 
      //neste caso chama-se um 'controlador' privado que trata deste caso -- ver abaixo
      $this->mostrar_resultados($termo_inserir);
    }else{
      //se o termo é vazio mostra o formulario novamente
      $this->load->view('view_inserir'); 
    }    
   }

  //função privada chamada quando é submetida uma pesquisa
  private function mostrar_resultados($termo_inserir) {

      //faz o load do modelo de dados necessário
      $this->load->model('produto_model');

      //vai buscar o resultado da pesquisa  
      $query = $this->produto_model->get_produto_designacao($termo_inserir);

      //obtem o resultado em forma de array bidimensional
      $data['resultados_pesquisa'] = $query->result_array();
      $data['termo_pesquisa'] = $termo_inserir;

      //passa as variáveis anteriores para a view
      $this->load->view('view_inserir', $data);
  }
}
?>
