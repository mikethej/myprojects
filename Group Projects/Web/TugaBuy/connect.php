<?php
    $dbhost = "appserver.di.fc.ul.pt";
    $dbuser = "asw46586";
    $dbpass = "asw46586";
    $dbnome = "asw46586";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Couldn't connect");
    $base= mysqli_select_db($conn,$dbnome) or die ('Não foi possivel conectar ao banco de dados...');
?>