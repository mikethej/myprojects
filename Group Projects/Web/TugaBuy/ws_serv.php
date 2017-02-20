<?php
    require_once "lib/nusoap.php";
    function ValorActualDoItem($id) {
        include 'connect.php';
        $sqla = "SELECT * FROM artigos WHERE item_id = ".$id.";";
        $querya = mysqli_query($conn, $sqla) or die("Error4");
        while($rew = mysqli_fetch_assoc($querya)){
            $valor = $rew['valor_base'];
        }
        $sqlp = "SELECT * FROM licitacoes WHERE item_id = '".$id."';"; //Procura as licitacoes para o produto da pagina
        $queryp = mysqli_query($conn, $sqlp) or die("Error1");
        $vatual = $valor;
        $raw = array();
        if (!empty($queryp)){
            while($row = mysqli_fetch_assoc($queryp)){
                $valorl = $row['valor'];
                array_push($raw, $valorl);
            }
            foreach($raw as &$value){
                if($value > $vatual){
                    $vatual=$value;
                }
            }
        }
        return $vatual;
    }
    function LicitaItem($id, $valor, $username, $password) {
        include 'connect.php';
        $password = md5($password);
        $dataatual = date("Y-m-d");
        $horaatual = date("H:i:s");
        $data_licit = date("Y-m-d H:i:s");
        $query = "SELECT * FROM utilizadores WHERE nick = '".$username."';";
        $res = mysqli_query($conn, $query) or die("Error");
        while($row = mysqli_fetch_assoc($res)){
            $dbpassword = $row['pal_chave'];
            $user_id = $row['user_id'];
        }
        if($password == $dbpassword){
            $queryid = "SELECT * FROM artigos WHERE item_id = '$id'";
            $resa = mysqli_query($conn, $queryid) or die("Error");
            while($row = mysqli_fetch_assoc($resa)){
                $iduser = $row['user_id'];
                $datafim = $row['data_fim'];
                $horafim = $row['hora_final'];
                $maximo = $row['melhor_val'];
            }
            if($user_id != $iduser){
                if(strtotime($dataatual) < strtotime($datafim) || (strtotime($dataatual) == strtotime($datafim) && strtotime($horaatual) < strtotime($horafim))){
                    $vatual = ValorActualDoItem($id);
                    if($valor > $vatual and $valor < $maximo){
                        $sql = "INSERT INTO licitacoes VALUES('$user_id', '$id', '$data_licit', '$valor', '0')";
                        $re = mysqli_query($conn, $sql) or die("Error");
                        return "Aceite";
                    }
                    else{
                        return "Nao aceite";
                    }
                }
                else{
                    return "Terminado";
                }
            }
        }
        return "Não aceite";
    }
    $server = new soap_server();
    
    $server->configureWSDL('Web Service','urn:cumpwsdl');

    $server->register("LicitaItem", // nome metodo
        array('id'=> 'xsd:string', 'valor'=> 'xsd:string', 'username'=> 'xsd:string', 'password' => 'xsd:string'), // input
        array('return' => 'xsd:string'), // output
        'uri:cumpwsdl', // namespace
        'urn:cumpwsdl#LicitaItem', // SOAPAction
        'rpc', // estilo
        'encoded' // uso
    );

    $server->register("ValorActualDoItem", // nome metodo
        array('id' => 'xsd:string'), // input
        array('return' => 'xsd:string'), // output
        'uri:cumpwsdl', // namespace
        'urn:cumpwsdl#ValorActualDoItem', // SOAPAction
        'rpc', // estilo
        'encoded' // uso
    );

    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    $server->service($HTTP_RAW_POST_DATA);
?>
