<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_cliente = $_REQUEST['id_cliente'];

        $dui = $_REQUEST['dui'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];

        //COMIENZA
        $db->autocommit(FALSE);

        //actualizar primero empleado
        $result_cargo = $db->query("UPDATE t_cliente SET c_dui = '$dui', c_nombre = '$nombre', c_apellido = '$apellido', c_direccion = '$direccion', c_telefono = '$telefono' WHERE e_idcliente = $id_cliente");

        if($result_cargo) {
            echo $id_cargo;

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