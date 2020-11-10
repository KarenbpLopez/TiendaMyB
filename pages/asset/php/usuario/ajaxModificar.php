<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_user = $_REQUEST['id_user'];

        $usuario = $_REQUEST['usuario'];
        $clave = md5($_REQUEST['clave']);
       // $nivel = $_REQUEST['nivel'];
        $correo = $_REQUEST['correo'];

        //COMIENZA
        $db->autocommit(FALSE);

        //actualizar primero empleado
        $result_user = $db->query("UPDATE t_usuario SET c_nombreusuario = '$usuario', c_clave = '$clave', c_correo = '$correo' WHERE e_idusuario = $id_user");
                                                                                                        //, ty_nivel = $nivel
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