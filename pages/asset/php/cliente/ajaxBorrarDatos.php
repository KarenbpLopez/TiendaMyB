<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_cliente = $_REQUEST['id_cliente'];

        //COMIENZA
        $db->autocommit(FALSE);

        //borrar primero dias
        $result_cliente = $db->query("DELETE FROM t_cliente WHERE e_idcliente = $id_cliente");

        if($result_cliente) {
            echo 0;

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