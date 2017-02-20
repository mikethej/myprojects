<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal_Utente extends CI_Controller {

	/**
         * HELPERS:
         * redireciona para a mesma pagina(refresh da pagina)
         * ---> redirect(site_url('index.php/'.uri_string()),'refresh');
         * ---> $data['autorizacoes'][0]['au_estrangeiro'] != $this->input->post('au_estrangeiro')
	 */
 
	function __construct() {
		parent::__construct();
                $this->load->model('Mymodel');
		$this->load->library('DX_Auth');
		$this->load->helper('url');
		$this->load->helper('form');
                $this->load->helper('array');
                $this->load->helper('download');
                $this->load->library('Form_validation');
		date_default_timezone_set("Europe/Lisbon");
                $this->load->helper('date');
                $current_time = time();
                $today = date("j-m-Y");
	}
	
	public function index()
	{ 
            if(!$this->dx_auth->is_logged_in()){
                redirect('Welcome',refresh);
            }  else {
                $this->load->view('header_utente');
                $this->load->view('portal_utente');
            }
	}
        
        function editar_perfil(){
            $id_utente = $this->dx_auth->get_user_id();
            $val = $this->form_validation;
            $val->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->load->view('header_utente');
            
            //if ($this->dx_auth->is_logged_in()){ SE ESTIVER LOGADO 
                    $dados = array(
                    'id_utente' => $this->dx_auth->get_user_id(),
                    'nome_completo'   =>$this->input->post('nome') ,
                    'email' => $this->input->post('email') ,
                    'morada' => $this->input->post('morada'),
            );
              
            
            if(empty($dados['nome_completo']) && empty($dados['email']) && empty($dados['morada'])) {
                $dados['inf'] = $this->Mymodel->get_info_user_2($id_utente)->result_array();
                $this->load->view('editar_perfil', $dados);
            } else {

                if(!empty($dados['nome_completo'])){  
                    $this->Mymodel->mudar_nome($dados);
                    echo "<script type='text/javascript'>alert('Nome Alterado com sucesso!');</script>";
                    redirect(site_url('index.php/'.uri_string()),'refresh');
                }

                if($val->run() AND !empty($dados['email'])){  
                    $this->Mymodel->mudar_email($dados);
                    echo "<script type='text/javascript'>alert('Email com sucesso!');</script>";
                    redirect(site_url('index.php/'.uri_string()),'refresh');
                }

                if(!empty($dados['morada'])){  
                    $this->Mymodel->mudar_morada($dados);
                    echo "<script type='text/javascript'>alert('Morada com sucesso!');</script>";
                    redirect(site_url('index.php/'.uri_string()),'refresh');
                }
            }
        }
        /***        
         *    REGISTO DE MEDICOES
         * 
         */
        
        function peso_altura(){
          //if ($this->dx_auth->is_logged_in()){ SE ESTIVER LOGADO 
                    $dados = array(
                    'id_utente'   =>(int)$this->dx_auth->get_user_id(),
                    'peso' => $this->input->post('peso') ,
                    'altura' => $this->input->post('altura'),
                    'data' => date("j-m-Y, H:m"),
                    'hora' => time()
            );
                    
            $data['dados'] = $this->Mymodel->get_peso_altura();
            
            if(!empty($dados['peso'])){  
            $this->load->view('header_utente');
            $this->load->view('peso_altura',$data);
            $this->Mymodel->peso_altura($dados);
            echo "<script type='text/javascript'>alert('Medições inseridas com sucesso!');</script>";
            redirect(site_url('index.php/'.uri_string()),'refresh');
            }else{ 
                $this->load->view('header_utente');
                $this->load->view('peso_altura',$data);                 
            }
        }
        
        function glicemia(){
            $dados = array(
                    'id_utente'   => $this->dx_auth->get_user_id(),
                    'glicemia' => $this->input->post('glicemia') ,
                    'data' => date("j-m-Y, H:m"),
                    'hora' => time()
            );
            
            $data['dados'] = $this->Mymodel->get_glicemia();

            if(!empty($dados['glicemia'])){  
                $this->load->view('header_utente');
                $this->load->view('glicemia', $data);
                $this->Mymodel->glicemia($dados);
                echo "<script type='text/javascript'>alert('Medições inseridas com sucesso!');</script>";
                redirect(site_url('index.php/'.uri_string()),'refresh');
            }else{ 
                $this->load->view('header_utente');
                $this->load->view('glicemia', $data);                 
            }
        }
        
        function tensao_arterial(){
            $dados = array(
                    'id_utente'   => $this->dx_auth->get_user_id(),
                    'sistolica' => $this->input->post('sistolica') ,
                    'diastolica' => $this->input->post('diastolica'),
                    'data' => date("j-m-Y, H:m"),
                    'hora' => time()
            );
            
            $data['dados'] = $this->Mymodel->get_tensao_arterial();
            
            if(!empty($dados['sistolica']) && !empty($dados['diastolica'])){  
                $this->load->view('header_utente');
                $this->load->view('tensao_arterial',$data);
                $this->Mymodel->tensao_arterial($dados);
                echo "<script type='text/javascript'>alert('Medições inseridas com sucesso!');</script>";
                redirect(site_url('index.php/'.uri_string()),'refresh');
            }else{ 
                $this->load->view('header_utente');
                $this->load->view('tensao_arterial',$data);                 
            }
        }
        
        function colesterol(){
            $dados = array(
                    'id_utente'   => $this->dx_auth->get_user_id(),
                    'colesterol' => $this->input->post('colesterol'),
                    'data' => date("j-m-Y, H:m"),
                    'hora' => time()
            );
            $data['dados'] = $this->Mymodel->get_colesterol();
            if(!empty($dados['colesterol'])){  
            $this->load->view('header_utente');
            $this->load->view('colesterol',$data);
            $this->Mymodel->colesterol($dados);
            echo "<script type='text/javascript'>alert('Medições inseridas com sucesso!');</script>";
            redirect(site_url('index.php/'.uri_string()),'refresh');
            }else{ 
                $this->load->view('header_utente');
                $this->load->view('colesterol',$data);                 
            }
        }
        
        function trigliceridos(){
            $dados = array(
                    'id_utente'   => $this->dx_auth->get_user_id(),
                    'trigliceridos' => $this->input->post('trigliceridos') ,
                    'data' => date("j-m-Y, H:m"),
                    'hora' => time()
            );
            $data['dados'] = $this->Mymodel->get_trigliceridos();
            if(!empty($dados['trigliceridos'])){  
            $this->load->view('header_utente');
            $this->load->view('trigliceridos',$data);
            $this->Mymodel->trigliceridos($dados);
            echo "<script type='text/javascript'>alert('Medições inseridas com sucesso!');</script>";
            redirect(site_url('index.php/'.uri_string()),'refresh');
            }else{ 
                $this->load->view('header_utente');
                $this->load->view('trigliceridos',$data);                 
            }
        }
        
        function saturacao_oxigenio(){
            $dados = array(
                    'id_utente'   => $this->dx_auth->get_user_id(),
                    'saturacao_oxigenio' => $this->input->post('saturacao_oxigenio') ,
                    'data' => date("j-m-Y, H:m"),
                    'hora' => time()
            );
            $data['dados'] = $this->Mymodel->get_saturacao_oxigenio();
            if(!empty($dados['saturacao_oxigenio'])){  
            $this->load->view('header_utente');
            $this->load->view('saturacao_oxigenio',$data);
            $this->Mymodel->tensao_arterial($dados);
            echo "<script type='text/javascript'>alert('Medições inseridas com sucesso!');</script>";
            redirect(site_url('index.php/'.uri_string()),'refresh');
            }else{ 
                $this->load->view('header_utente');
                $this->load->view('saturacao_oxigenio',$data);                 
            }      
        }
        
        function inr(){
            $dados = array(
                    'id_utente'   => $this->dx_auth->get_user_id(),
                    'inr' => $this->input->post('inr') ,
                    'data' => date("j-m-Y, H:m"),
                    'hora' => time()
            );
             $data['dados'] = $this->Mymodel->get_inr();
            if(!empty($dados['inr'])){  
            $this->load->view('header_utente');
            $this->load->view('inr',$data);
            $this->Mymodel->inr($dados);
            echo "<script type='text/javascript'>alert('Medições inseridas com sucesso!');</script>";
            redirect(site_url('index.php/'.uri_string()),'refresh');
            }else{ 
                $this->load->view('header_utente');
                $this->load->view('inr',$data);                 
            }
        }
        
        /***        
         *    PARTILHA DE INFORMAÇÃO COM MEDICOS ASSISTENTES
         * 
         */
        function autorizacoes(){
            $user_id = $this->dx_auth->get_user_id();
            //$data['autorizacoes'][0]['au_estrangeiro'] != $this->input->post('au_estrangeiro')
            
            $dados = array();
            $data['autorizacoes'] = $this->Mymodel->get_autorizacoes($user_id);
       
            if(($this->input->post('au_part_reg_ins_user') != NULL ||
               $this->input->post('au_part_reg_clinicos') != NULL ||
               $this->input->post('au_notificacoes') != NULL ||
               $this->input->post('au_estrangeiro') != NULL || 
               $this->input->post('test_input') != NULL)
                    
            ) {
                if($this->input->post('au_part_reg_ins_user') == 'on') {
                    $dados['au_part_reg_ins_user'] = true;
                } else {
                    $dados['au_part_reg_ins_user'] = false;
                }
                if($this->input->post('au_part_reg_clinicos') == 'on') {
                    $dados['au_part_reg_clinicos'] = true;
                } else {
                    $dados['au_part_reg_clinicos'] = false;
                }
                if($this->input->post('au_notificacoes') == 'on') {
                    $dados['au_notificacoes'] = true;
                } else {
                    $dados['au_notificacoes'] = false;
                }
                if($this->input->post('au_estrangeiro') == 'on') {
                    $dados['au_estrangeiro'] = true;
                } else {
                    $dados['au_estrangeiro'] = false;
                }
                $this->Mymodel->insert_autorizacoes($dados);
                redirect(site_url('index.php/'.uri_string()),'refresh');
            //if($this->input->post('au_part_reg_ins_user') != $autorizacoes['au_part_reg_ins_user']){;
            } else {
                
                
                $this->load->view('header_utente', $dados);
                $this->load->view('autorizacoes',$data);
                //echo "<script type='text/javascript'>alert('LEL');</script>";
            }
            
             

        }
        /***        
         *    PEDIDO ISENCAO DE TAXAS
         * 
         */
         function isencao_taxas(){

             $dados = array(
                'nome'  => $this->Mymodel->get_user_nome_completo($this->dx_auth->get_user_id()),
                'data_nascimento' => $this->Mymodel->get_user_data_nascimento($this->dx_auth->get_user_id()),
                'username' => $this->dx_auth->get_username(),
                'nif' => $this->input->post('nif'),
                'nu_seg_social' => $this->input->post('nu_seg_social'),
                'morada' => $this->input->post('morada'),
                'cod_postal' => $this->input->post('cod_postal'),
                'localidade' => $this->input->post('localidade'),
                'telefone' => $this->input->post('telefone'),
                'email' => $this->input->post('email'),
                'elegibilidade' => 'pendente'
                );
            $username = $this->dx_auth->get_username();
            $query = $this->Mymodel->get_pedidos_isencao($username);
            $data['pedidos'] = $query->result_array();

           
            if(!empty($dados['nu_seg_social']) && !empty($dados['nif']) &&
               !empty($dados['morada']) && !empty($dados['cod_postal']) && !empty($dados['localidade'])  && !empty($dados['telefone']) && !empty($dados['email'])){
                // processar os dados enviados
                $this->Mymodel->register_isencao($dados);
                $this->load->view('header_utente');
                $this->load->view('isencao_taxas',$data);
                redirect(site_url('index.php/'.uri_string()),'refresh');

            } else {
                $this->load->view('header_utente');
                $this->load->view('isencao_taxas',$data);
            }        
        }
        
        function testamento_vital(){
                $this->load->view('header_utente');
                $this->load->view('testamento_vital');
        }
        
        function contactos_emergencia(){
            
            
            $dados = array (
                'id_utente' => $this->dx_auth->get_user_id(),
                'nome'      => $this->input->post('nome'),
                'telefone'      => $this->input->post('telefone'),
                'email'      => $this->input->post('email'),
                'cidade'      => $this->input->post('cidade')
            );
            $query = $this->Mymodel->get_contactos_emergencia();
            $data['contactos'] = $query->result_array();
            if($dados['nome']) {
                $this->Mymodel->contactos_emergencia($dados);
                $this->load->view('header_utente');
                $this->load->view('contactos_emergencia', $data);
                redirect(site_url('index.php/'.uri_string()),'refresh');
            } else {
                $this->load->view('header_utente');
                $this->load->view('contactos_emergencia', $data);
            }
            
                
        }
        function eliminar_contacto_emergencia(){
            //echo "<script>alert('ECKO');</script>";
            $query = $this->Mymodel->get_contactos_emergencia();
            $contactos = $query->result_array();
            $id = $this->input->post('id_contacto');
            foreach ($contactos as $contacto){
                if($contacto['id'] == $id){
                    $this->Mymodel->eliminar_contacto_emergencia($id);
                   redirect('index.php/Portal_Utente/contactos_emergencia','refresh');
                }
            }

        }
        /***        
         *    MARCAR CONSULTA BACKUP
         * 
         *
        function marcar_consultas(){
            $query = $this->Mymodel->get_consultas_marcadas();
            $contactos = $query->result_array();
            $data['consultas_marcadas'] = $query->result_array();

            //print_r($data);
            $this->load->view('header_utente');
            $this->load->view('marcar_consultas', $data);
            
            //medico por especialidade
            $especialidade = $this->input->post('especialidade');
            $this->Mymodel->get_medico_por_especialidade($especialidade);
            
            if(isset($_POST['medico'])){
                $id_medico = $this->Mymodel->get_id_medico($_POST['medico'])[0];
                $dados = array(
                'id_utente' => $this->dx_auth->get_user_id(),
                'nome_medico' => $this->Mymodel->get_nome_medico($id_medico),
                'especialidade' => $_POST['consulta'],
                'id_medico'   => $id_medico,  
                'hora'     => $_POST['hora'],
                'data'          => $_POST['dia']
                );
            }
            
            if(!empty($dados)) {
                $this->Mymodel->inserir_consulta($dados);
                //redirect("index.php/Portal_Utente/marcar_consultas","refresh");
                redirect(site_url('index.php/'.uri_string()),'refresh');
            } 
        }
         */
        
        function marcar_consultas(){
            $query = $this->Mymodel->get_consultas_marcadas();
            $contactos = $query->result_array();
            $data['consultas_marcadas'] = $query->result_array();

            $query = $this->Mymodel->get_consultas_efectuadas();
            $contactos = $query->result_array();
            $data['consultas_efectuadas'] = $query->result_array();
            
            $this->load->view('header_utente');
            $this->load->view('marcar_consultas', $data);
            
            //medico por especialidade
            $especialidade = $this->input->post('especialidade');
            $this->Mymodel->get_medico_por_especialidade($especialidade);
            
            if(isset($_GET['nome_medico']) && isset($_GET['data']) && isset($_GET['hora'])){
                $id_medico = $this->Mymodel->get_id_medico($_GET['nome_medico'])[0];
                $dados = array(
                'id_utente' => $this->dx_auth->get_user_id(),
                'nome_medico' => $_GET['nome_medico'],
                'especialidade' => $_GET['especialidade'],
                'id_medico'   => $id_medico,  
                'hora'     => $_GET['hora'],
                'data'          => $_GET['data']
                );
            }
            
            
            
            if(!empty($dados)) {
                $this->Mymodel->inserir_consulta($dados);
                //redirect("index.php/Portal_Utente/marcar_consultas","refresh");
                redirect(site_url('index.php/'.uri_string()),'refresh');
            } 
        }
        
        
        function get_medicos_especialidade() {
            $especialidade = $_GET['q'];
            $select = $this->Mymodel->get_medico_por_especialidade($especialidade);
            
            $medicos = $select->result_array();
            
            echo "<option name=''></option>";
            
            foreach ($medicos as $medico) {
                
                $nome = $medico['nome'];
                
                echo "<option name='$nome'>$nome</option>";
            }
        }
        
        function get_consultas_marcadas_medico() {
            $dia = $_GET['data'];
            $nome = $_GET['nome_medico'];
            $horas = $this->Mymodel->get_consultas_marcadas_medico($dia, $nome);
            //print_r($horas);

            for($i = 8; $i < 17; $i++) {
                if($i == 8) {
                    echo "<th>Horas</th>";
                } else {
                    if( in_array($i,$horas) ) {
                        echo "<td><p><i>Ocupado</i></p></td>";
                    } else {
                        echo "<td><button class=\"btn btn-info btn-fill\" id=\"popup\" onclick=\"set_hora('$i'); marcar_consulta();\">Marcar</button></td>";
                        
                    }
                }
            
            }
        }
        
        
        function eliminar_consulta(){
            $id_utente = $this->dx_auth->get_user_id();
            $id_consulta = $this->input->post('id_consulta');
            
            $this->Mymodel->eliminar_consulta($id_utente,$id_consulta);
            redirect("index.php/Portal_Utente/marcar_consultas","refresh");
        }
        
        function popup(){

            $query = $this->Mymodel->get_medicos();
            $data['medicos'] = $query;
            
            //print_r($data['medicos']);
            
            $this->load->view('header_utente');
            $this->load->view('popupform',$data);
        }
        
        /***        
         *    RENOVAR MEDICACAO
         * 
         */
        function renovar_medicacao(){
            
            $id_utente = $this->dx_auth->get_user_id();

            $query = $this->Mymodel->get_medicacao($id_utente);
            $data['medicamentos'] = $query->result_array();
            
            $query = $this->Mymodel->get_renovacoes($id_utente);
            $data['pedidos_renovacao'] = $query->result_array();
            
            $this->load->view('header_utente');
            $this->load->view('renovar_medicacao',$data);  
        }
        
        function set_renovacao(){
            
            $id_utente = $this->dx_auth->get_user_id();
            
            $id_receita = $this->input->post('id_receita');
            
            $id_medico = $this->Mymodel->get_receita_id_medico();
            
            $date = date("j-m-Y");
            
            $this->Mymodel->set_renovacao($id_utente,$id_receita,$id_medico,$date);
            
            redirect("index.php/Portal_Utente/renovar_medicacao","refresh");
        }
        
        function gerar_receita(){
            //get medicamentos
            $id_receita = $this->input->post('id_receita');

            $id_utente = $this->dx_auth->get_user_id();

            //get receitas
            $id_medico = $this->Mymodel->get_receita_id_medico();
           
            $query = $this->Mymodel->get_receita_pdf($id_receita);

            $data['medicamentos'] = $query->result_array();

            
            $data['receita'] = array(
                'id_receita' => $id_receita,
                'nome_utente' => $this->Mymodel->get_user_nome_completo(),
                'nome_medico' => $this->Mymodel->get_nome_medico($id_medico),
                'numero_utente' => $this->dx_auth->get_username(),

            );
            $this->load->view('receita_medica',$data);
        }
        
        /*
         * Registos Clinicos
         * 
         */
        
        function registos_clinicos(){
            $id_utente = $this->dx_auth->get_user_id();
            
            //mostrar consultas
            $query_registos_clinicos = $this->Mymodel->get_registos_clinicos($id_utente);
            
            $data['registos_clinicos'] = $query_registos_clinicos->result_array();
            
            $this->load->view('header_utente');
            $this->load->view('registos_clinicos', $data);
        }
        function download(){
            $file_id = $_GET['id'];
            force_download('./registos_medicos/'.$file_id.'.pdf', NULL);
        }
}  

