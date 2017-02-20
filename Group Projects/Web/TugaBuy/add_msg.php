<?php
    include 'connect.php';

    $pergunta = htmlspecialchars($_POST['mensagem']);
    $idi = $_GET['id'];

    $q = "SELECT * FROM artigos WHERE item_id = '".$idi."';";
    $resa = mysqli_query($conn, $q) or die("Erro aqui_1");
    while($row = mysqli_fetch_assoc($resa)){
        $idp = $row['user_id'];
    }

    $nick = $_COOKIE['nick'];

    $query = "SELECT * FROM utilizadores WHERE nick = '".$nick."';";
    $res = mysqli_query($conn, $query) or die("Erro aqui_2");
    while($row = mysqli_fetch_assoc($res)){
        $pide = $row['user_id'];
    }

    $data = date("Y-m-d H:i:s");

    $qeu = "INSERT INTO perguntas(user_id, perg_id, item_id, data_perg, pergunta) VALUES ('$idp','$pide','$idi','$data','$pergunta')";
    $resaa = mysqli_query($conn, $qeu) or die("Erro aqui_3");
    echo "<script>window.location.href = 'product-details?id=".$idi."';</script>";
?>
