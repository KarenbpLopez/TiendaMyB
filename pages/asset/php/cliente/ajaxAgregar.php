<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $dui = $_REQUEST['dui'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $direccion = $_REQUEST['direccion'];
        $telefono = $_REQUEST['telefono'];

        //COMIENZA
        $db->autocommit(FALSE);

        //insertar primero cliente
        $result_cliente = $db->query("INSERT INTO t_cliente(c_dui, c_nombre, c_apellido, c_direccion, c_telefono) VALUES ('$dui','$nombre','$apellido','$direccion','$telefono')");
        $id_cliente = $db->insert_id;

        if($result_cliente) {
            echo $id_cliente;

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