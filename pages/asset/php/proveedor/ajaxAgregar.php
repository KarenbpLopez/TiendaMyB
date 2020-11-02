<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $nombre = $_REQUEST['nombre'];
        $telefono = $_REQUEST['telefono'];

        //COMIENZA
        $db->autocommit(FALSE);

        //insertar primero cargo
        $result_proveedor = $db->query("INSERT INTO t_proveedor(c_nombre, c_telefono) VALUES ('$nombre','$telefono')");
        $id_proveedor = $db->insert_id;

        if($result_proveedor) {
            echo $id_proveedor;

            $db->commit();
            $db->autocommit(TRUE);
        }
        else {
            echo -1;
            $db->rollback();
            $db->autocommit(TRUE);
        }

        //TERMINA
    }
    else {
        echo -1;
    }
?>