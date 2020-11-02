<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_proveedor = $_REQUEST['id_proveedor'];

        $nombre = $_REQUEST['nombre'];
        $telefono = $_REQUEST['telefono'];

        //COMIENZA
        $db->autocommit(FALSE);

        //actualizar primero empleado
        $result_cargo = $db->query("UPDATE t_proveedor SET c_nombre = '$nombre', c_telefono = '$telefono' WHERE e_idproveedor = $id_proveedor");

        if($result_cargo) {
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