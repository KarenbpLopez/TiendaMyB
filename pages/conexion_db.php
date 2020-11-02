<?php
    $db_host="localhost";
    $db_usuario="root";
    $db_password="";
    $db_nombre="tiendamb";

    //originales
    $db = new mysqli($db_host, $db_usuario, $db_password,$db_nombre) or die(mysql_error());
?>