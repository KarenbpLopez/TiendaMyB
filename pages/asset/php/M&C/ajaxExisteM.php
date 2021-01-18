<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $nombre = $_REQUEST['nombre'];

    $result = $db->query("SELECT m.e_idmarca,m.c_nombremarca FROM t_marca as m WHERE m.c_nombremarca = '$nombre'");

    if($result->num_rows > 0) {
        echo -1;
    }
    else {
        echo 0;
    }
?>