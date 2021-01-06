<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_producto = $_REQUEST['id_producto'];

        //COMIENZA
        $db->autocommit(FALSE);

        //borrar producto
        $result_producto = $db->query("DELETE FROM t_producto WHERE e_idproducto = $id_producto");

        if($result_producto) {
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