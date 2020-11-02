<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_proveedor = $_REQUEST['id_proveedor'];

        //COMIENZA
        $db->autocommit(FALSE);

        //borrar primero dias
        $result_proveedor = $db->query("DELETE FROM t_proveedor WHERE e_idproveedor = $id_proveedor");

        if($result_proveedor) {
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