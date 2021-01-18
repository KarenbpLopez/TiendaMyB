<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $nombre = $_REQUEST['nombre'];

    $result = $db->query("SELECT c.e_idcategoria,c.c_nombrecategoria FROM t_categoria as c WHERE c.c_nombrecategoria = '$nombre'");

    if($result->num_rows > 0) {
        echo -1;
    }
    else {
        echo 0;
    }
?>