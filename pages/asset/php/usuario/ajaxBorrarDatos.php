<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_user = $_REQUEST['id_user'];

        //COMIENZA
        $db->autocommit(FALSE);

        //borrar primero dias
        $result_user = $db->query("DELETE FROM t_usuario WHERE e_idusuario = $id_user");

        if($result_user) {
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