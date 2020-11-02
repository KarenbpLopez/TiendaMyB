<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $usuario = $_REQUEST['usuario'];
        $clave = md5($_REQUEST['clave']);
        $nivel = $_REQUEST['nivel'];
        $empleado = $_REQUEST['empleado'];
        $correo = $_REQUEST['correo'];

        //COMIENZA
        $db->autocommit(FALSE);

        //insertar primero empleado
        $result_user = $db->query("INSERT INTO t_usuario(c_nombreusuario, c_clave, ty_nivel, c_preguntarespaldo, c_respuestarespaldo, e_idempleado, c_correo) VALUES ('$usuario','$clave',0,'','',$empleado,'$correo')");
        $id_user = $db->insert_id;

        if($result_user) {
            echo $id_user;

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