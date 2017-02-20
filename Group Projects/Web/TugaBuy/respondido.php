<?php
    include 'connect.php';
    $idp = $_GET['id'];
    $resposta = $_POST['resposta'];
    $data = date("Y-m-d H:i:s");
    $qeu = "UPDATE perguntas SET resposta = '$resposta', data_resp='$data' WHERE id_pergunta = '$idp';";
    $resaa = mysqli_query($conn, $qeu) or die("Erro aqui");
    echo "<script>window.location.href = 'perfil';</script>";
?>
