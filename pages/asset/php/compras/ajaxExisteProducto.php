<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $codigo = $_REQUEST['codigo'];

    $result = $db->query("SELECT p.e_idproducto,p.c_nombreproducto FROM t_producto as p WHERE p.c_codigo = '$codigo'");

    if($result->num_rows > 0) {
        while($row = mysqli_fetch_array($result)) {
            echo $row[0].",".$row[1];
        }
    }
    else {
        echo -1;
    }
?>