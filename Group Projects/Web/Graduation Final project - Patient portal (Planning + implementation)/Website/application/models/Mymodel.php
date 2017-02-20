<?php

defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - my_model.php (1a versão)
//            - Modelo de dados para as proprias tabelas
// ===========================================================================

class Mymodel extends CI_Model {
 // MARCAR CONSULTAS
    function inserir_consulta($dados) {
        
        $this->db->insert('consulta', $dados);
        
    }
    
    function get_medicos(){
        $select = "SELECT nome FROM medico";
        $query = $this->db->query($select);
        $result = $this->arrayFlatten($query->result_array());
        return $result;
    }
    
    function get_id_medico($nome_medico){
        $select = "SELECT id FROM medico WHERE nome = '$nome_medico'";
        $query = $this->db->query($select);
        $result = $this->arrayFlatten($query->result_array());
        return $result;
    }
    

    
    //INSERIR MEDIÇÕES
    function peso_altura($dados){
        $this->db->insert('medicoes', $dados); 
    }
    function glicemia($dados){
        $this->db->insert('medicoes', $dados); 
    }
    function tensao_arterial($dados){
        $this->db->insert('medicoes', $dados); 
    }
    function colesterol($dados){
        $this->db->insert('medicoes', $dados); 
    }
    function trigliceridos($dados){
        $this->db->insert('medicoes', $dados); 
    }
    function saturacao_oxigenio($dados){
        $this->db->insert('medicoes', $dados); 
    }
    function inr($dados){
        $this->db->insert('medicoes', $dados); 
    }
    function batimento_cardiaco($dados){
        $this->db->insert('medicoes', $dados); 
    }
    
    // GET MEDICOES
    function get_peso_altura(){
        $user_id = $this->dx_auth->get_user_id(); 
        
        $select = "SELECT peso FROM medicoes WHERE id_utente = '$user_id' AND peso != 0";
        $select1 = "SELECT data FROM medicoes WHERE id_utente = '$user_id' AND peso != 0 AND altura != 0";
        $select2 = "SELECT altura FROM medicoes WHERE id_utente = '$user_id' AND altura !=0";
        $query = $this->db->query($select);
        $query1 = $this->db->query($select1);
        $query2 = $this->db->query($select2);
        
        $result = $this->arrayFlatten($query->result_array());
        $result1 = $this->arrayFlatten($query1->result_array());
        $result2 = $this->arrayFlatten($query2->result_array());

        return array_map(NULL, $result,$result1,$result2);
    }
    function get_glicemia(){
        $user_id = $this->dx_auth->get_user_id(); 
        
        $select = "SELECT glicemia FROM medicoes WHERE id_utente = '$user_id' AND glicemia != 0";
        $select1 = "SELECT data FROM medicoes WHERE id_utente = '$user_id' AND glicemia != 0";
        $query = $this->db->query($select);
        $query1 = $this->db->query($select1);
        
        $result = $this->arrayFlatten($query->result_array());
        $result1 = $this->arrayFlatten($query1->result_array());

        return array_map(NULL, $result,$result1);
    }
    function get_tensao_arterial(){
        $user_id = $this->dx_auth->get_user_id(); 
        
        $select = "SELECT sistolica FROM medicoes WHERE id_utente = '$user_id' AND sistolica != 0";
        $select1 = "SELECT data FROM medicoes WHERE id_utente = '$user_id' AND sistolica != 0 AND diastolica != 0";
        $select2 = "SELECT diastolica FROM medicoes WHERE id_utente = '$user_id' AND diastolica !=0";
        $query = $this->db->query($select);
        $query1 = $this->db->query($select1);
        $query2 = $this->db->query($select2);
        
        $result = $this->arrayFlatten($query->result_array());
        $result1 = $this->arrayFlatten($query1->result_array());
        $result2 = $this->arrayFlatten($query2->result_array());

        return array_map(NULL, $result,$result1,$result2);
    }
    function get_colesterol(){
        $user_id = $this->dx_auth->get_user_id(); 
        
        $select = "SELECT colesterol FROM medicoes WHERE id_utente = '$user_id' AND colesterol != 0";
        $select1 = "SELECT data FROM medicoes WHERE id_utente = '$user_id' AND colesterol != 0";
        $query = $this->db->query($select);
        $query1 = $this->db->query($select1);
        
        $result = $this->arrayFlatten($query->result_array());
        $result1 = $this->arrayFlatten($query1->result_array());

        return array_map(NULL, $result,$result1);
    }
    function get_trigliceridos(){
        $user_id = $this->dx_auth->get_user_id(); 
        
        $select = "SELECT trigliceridos FROM medicoes WHERE id_utente = '$user_id' AND trigliceridos != 0";
        $select1 = "SELECT data FROM medicoes WHERE id_utente = '$user_id' AND trigliceridos != 0";
        $query = $this->db->query($select);
        $query1 = $this->db->query($select1);
        
        $result = $this->arrayFlatten($query->result_array());
        $result1 = $this->arrayFlatten($query1->result_array());

        return array_map(NULL, $result,$result1);
    }
    function get_saturacao_oxigenio(){
        $user_id = $this->dx_auth->get_user_id(); 
        
        $select = "SELECT saturacao_oxigenio FROM medicoes WHERE id_utente = '$user_id' AND saturacao_oxigenio != 0";
        $select1 = "SELECT data FROM medicoes WHERE id_utente = '$user_id' AND saturacao_oxigenio != 0";
        $query = $this->db->query($select);
        $query1 = $this->db->query($select1);
        
        $result = $this->arrayFlatten($query->result_array());
        $result1 = $this->arrayFlatten($query1->result_array());

        return array_map(NULL, $result,$result1);
    }
    function get_inr(){
        $user_id = $this->dx_auth->get_user_id(); 
        
        $select = "SELECT inr FROM medicoes WHERE id_utente = '$user_id' AND inr != 0";
        $select1 = "SELECT data FROM medicoes WHERE id_utente = '$user_id' AND inr != 0";
        $query = $this->db->query($select);
        $query1 = $this->db->query($select1);
        
        $result = $this->arrayFlatten($query->result_array());
        $result1 = $this->arrayFlatten($query1->result_array());

        return array_map(NULL, $result,$result1);
    }
    function get_batimento_cardiaco(){
        $user_id = $this->dx_auth->get_user_id(); 
        
        $select = "SELECT batimento_cardiaco FROM medicoes WHERE id_utente = '$user_id' AND batimento_cardiaco != 0";
        $select1 = "SELECT data FROM medicoes WHERE id_utente = '$user_id' AND batimento_cardiaco != 0";
        $query = $this->db->query($select);
        $query1 = $this->db->query($select1);
        
        $result = $this->arrayFlatten($query->result_array());
        $result1 = $this->arrayFlatten($query1->result_array());

        return array_map(NULL, $result,$result1);
    }
    function contactar_equipa($data){
        $this->db->insert('contactar_equipa',$data);
    }
    // EDITAR PERFIL
    function mudar_nome($dados){
        $dadosnovos = array(
            'nome_completo' => $dados['nome_completo']
            );
        $this->db->where('id', $dados['id_utente']);
        $this->db->update('users', $dadosnovos);
    }
    function mudar_email($dados){
        $dadosnovos = array(
            'email' => $dados['email']
            );
        $this->db->where('id', $dados['id_utente']);
        $this->db->update('users', $dadosnovos);
    }
    function mudar_morada($dados){
        $dadosnovos = array(
            'morada' => $dados['morada']
            );
        $this->db->where('id', $dados['id_utente']);
        $this->db->update('users', $dadosnovos);
    }
    
    // INFORMACOES DO USER
    function get_info_user($id_user){
        $infos = $this->db->get_where('users', $id_user );
        return $infos;
    }
    
    function get_info_user_2($id_user){
        $select = "SELECT * FROM users WHERE id = $id_user";
        $query = $this->db->query($select);
        return $query;
    }
    
    function get_user_nome_completo(){
        $user_id = $this->dx_auth->get_user_id();
        $select = "SELECT nome_completo FROM users WHERE id = '$user_id'";
		$query = $this->db->query($select);
		$nome_completo = $this->arrayFlatten($query->result_array());
                    return $nome_completo[0];
    }
    
    function get_user_data_nascimento($user_id){
        $select = "SELECT data_nascimento FROM users WHERE id = '$user_id'";
		$query = $this->db->query($select);
		$data_nas = $this->arrayFlatten($query->result_array());
                    return $data_nas[0];
    }

    //REGISTAR AUTORIZACOES
    function insert_autorizacoes($dados){
        $this->db->update('users',$dados);
    }
    function get_autorizacoes($user_id){
        $this->db->select('au_part_reg_ins_user, au_part_reg_clinicos,au_notificacoes,au_estrangeiro');

        $query = $this->db->get_where('users',array('id' => $user_id));
        // Produces: SELECT title, content, date FROM mytable
        return $query->result_array();
    }
    
    //REGISTAR PEDIDO DE ISENCAO
    function register_isencao($dados){
        $this->db->insert('pedidos_isencao',$dados);
    }
    //CONTACTOS EMERGENCIA
    function contactos_emergencia($dados){
        $this->db->insert('contactos_emergencia', $dados);
    }
    
    //FLATERN ARRAY
    	private function arrayFlatten($array) { 
		$flattern = array(); 
		foreach ($array as $key => $value){ 
		    $new_key = array_keys($value); 
		    $flattern[] = $value[$new_key[0]]; 
		} 
		return $flattern; 
	}


    //  GET INFOS CONTACTOS EMERGENCIA
    function get_contactos_emergencia() {
        $user_id = $this->dx_auth->get_user_id();
        
        $select = "SELECT * FROM contactos_emergencia WHERE id_utente = '$user_id'";
        $query = $this->db->query($select);
        return $query;
    }
    
    //  GET CONSULTAS MARCADAS
    function get_consultas_marcadas() {
        $user_id = $this->dx_auth->get_user_id();
        
        $select = "SELECT * FROM consulta WHERE id_utente = '$user_id' AND estado = 0";
        $query = $query = $this->db->query($select);
        return $query;
    }
    
    function get_consultas_efectuadas() {
        $user_id = $this->dx_auth->get_user_id();
        
        $select = "SELECT * FROM consulta WHERE id_utente = '$user_id' AND estado != 0";
        $query = $query = $this->db->query($select);
        return $query;
    }
    /*
     * Consultas
     */
    
    function get_consultas_marcadas_medico($date, $nome_medico) {
        $select_id_medico = "SELECT id FROM medico WHERE nome = '$nome_medico'";
        $query = $this->db->query($select_id_medico);
        $result = $this->arrayFlatten($query->result_array());
        $id_medico = $result[0];
        $select = "SELECT hora FROM consulta WHERE id_medico = $id_medico AND data = '$date'";
        $query2 = $this->db->query($select);
        $result2=$this->arrayFlatten($query2->result_array());
        return $result2;
    }
    
    //elimina 1 contacto de emergencia
    function eliminar_contacto_emergencia($id_contacto){
        $query = "DELETE FROM contactos_emergencia WHERE id = '$id_contacto'";
        $this->db->query($query);
    }
    function eliminar_consulta($id_utente,$id_consulta){
        $this->db->delete('consulta',array('id_utente' => $id_utente,'id' => $id_consulta));
    }

    function get_pedidos_isencao($username){
                
        $select = "SELECT * FROM pedidos_isencao WHERE username = '$username'";
        $query = $this->db->query($select);
        return $query;
    }
    /*
     * MEDICOS
     */
    function get_nome_medico($id_medico){

        $select = "SELECT nome FROM medico WHERE id = '$id_medico'";
        $query = $this->db->query($select);
        $result = $this->arrayFlatten($query->result_array());
        return $result[0];
    }
    function get_medico_por_especialidade($especialidade){
        $select = "SELECT id,nome FROM medico WHERE especialidade = '$especialidade'";
        $query = $this->db->query($select);
        return $query;
    }
    
    /***
     * RENOVAR MEDICACAO
     * retorna o medicamentos da receita com o id
     */
    function get_medicacao($id_utente){
        $select = "SELECT m.*,r.estado,r.data,r.id as id_receita FROM medicamentos m, receitas r WHERE r.nu_utente = '$id_utente' AND r.id_medicamento IN (SELECT id_medicamento FROM receitas WHERE r.id_medicamento = m.id)";
        $query = $this->db->query($select);
        return $query;
    }
    function get_renovacoes($id_utente){
        $select = "SELECT m.*,rm.estado,rm.data,rm.id_receita FROM medicamentos m, renovar_medicacao rm WHERE rm.id_utente = '$id_utente' AND rm.id_receita IN (SELECT r.id FROM receitas r WHERE r.id_medicamento = m.id)";
        $query = $this->db->query($select);
        return $query;
    }
    
    function set_renovacao($id_utente,$id_receita,$id_medico,$data){
        
         $insert = "INSERT INTO renovar_medicacao (id_utente,id_receita,id_medico,data) VALUES ($id_utente,$id_receita,$id_medico,'$data')";
         $this->db->query($insert);
    }
    
    function get_receita(){
        $id_utente = $this->dx_auth->get_user_id();
        
        $select = "SELECT * FROM receitas WHERE nu_utente = '$id_utente'";
                $query = $this->db->query($select);
        return $query;
    }
    
    function get_receita_id_medico(){
        $id_utente = $this->dx_auth->get_user_id();
        
        $select = "SELECT id_medico FROM receitas WHERE nu_utente = '$id_utente'";
        $query = $this->db->query($select);
        $id_medico = $this->arrayFlatten($query->result_array());
        return $id_medico[0];
    }
    function get_receita_pdf($id_receita){
        $id_utente = $this->dx_auth->get_user_id();
        
        $select = "SELECT r.*,m.* FROM receitas r, medicamentos m WHERE r.nu_utente = '$id_utente' AND r.id = '$id_receita' AND  r.id_medicamento IN (SELECT id_medicamento FROM receitas WHERE r.id_medicamento = m.id)";
        $query = $this->db->query($select);
        return $query;
    }
    
    /*
     *Registos Clinicos 
     * 
     */
    function get_history_consultas_user($id_utente){
        $select = "SELECT * FROM consulta WHERE id_utente = '$id_utente'";
        $query = $query = $this->db->query($select);
        return $query;
    }
    
    function get_registos_clinicos($id_utente) {
        $select = "SELECT registos_clinicos.*, medico.nome FROM registos_clinicos INNER JOIN medico
                    ON registos_clinicos.id_medico=medico.id
                    WHERE registos_clinicos.id_utente = $id_utente;";
        $query = $this->db->query($select);
        return $query;
        
    }
    
    /***
     * FIM DO MODEL
     */
}
?>