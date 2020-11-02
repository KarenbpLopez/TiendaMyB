<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_user = $_REQUEST['id_user'];
        $clave = md5($_REQUEST['clave']);

        //COMIENZA
        $db->autocommit(FALSE);

        //actualizar primero empleado
        $result_user = $db->query("UPDATE t_usuario SET c_clave = '$clave', c_passwordtmp = '' WHERE e_idusuario = $id_user");

        if($result_user) {
            echo $id_emp;

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