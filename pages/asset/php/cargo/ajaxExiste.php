<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $nombre = $_REQUEST['nombre'];

    $result = $db->query("SELECT c.e_idcargo,c.c_nombrecargo,c.db_salario, c.e_tipo FROM t_cargo as c WHERE c.c_nombrecargo = '$nombre'");

    if($result->num_rows > 0) {
        echo -1;
    }
    else {
        echo 0;
    }
?>