<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// ===========================================================================
//            - produto_model.php (1a versão)
//            - Guardar em models/
//            - Modelo de dados para o produto
// ===========================================================================

class produto_model extends CI_Model {

  //obtem os produtos com determinada designacao
   function get_produto_designacao($designacao)
   {
    $interrogacao_sql = "INSERT INTO produto (referencia, designacao, preco, stock)"." VALUES ($referencia,$designacao,$preco,$stock)";
    $resultado = mysqli_query($dbconnection, $comando_sql);

    if (strlen($designacao) > 0) {
        $interrogacao_sql = $interrogacao_sql . " WHERE LOWER(designacao) LIKE '%" .
                      strtolower($designacao) . "%'";
    }

    $query = $this->db->query($interrogacao_sql);
    return $query;
   }

}
?>
