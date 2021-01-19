<?php
    $db_host="localhost";
    // $db_host="pl15012.comues.com";
    $db_usuario="root";
    // $db_usuario="comuesco_pl15012";
    $db_password="";
    // $db_password="g0(Ye=OR8vmM";
    // $db_nombre="comuesco_pl15012";
    $db_nombre="tiendamb";

    //originales
    $db = new mysqli($db_host, $db_usuario, $db_password,$db_nombre) or die(mysql_error());
?>