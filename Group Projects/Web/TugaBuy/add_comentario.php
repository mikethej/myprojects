<?php
    include 'connect.php';	
    
    $nome = htmlspecialchars($_POST['nome']);
    $comentario = htmlspecialchars($_POST['comentario']);
    $idi = $_GET['id'];
    $query = "INSERT INTO comentarios VALUES ('$nome', '$idi', '$comentario');";
    $resa = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if(!$resa){
        die("Error: ".$query);
    }
    echo "<script>window.location.href = 'product-details?id=".$idi."';</script>";
?>
