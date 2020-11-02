<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_emp = $_REQUEST['id_emp'];
        $id_hora = $_REQUEST['id_hora'];

        //COMIENZA
        $db->autocommit(FALSE);

        //borrar primero dias
        $result_dias = $db->query("DELETE FROM t_diashorario WHERE e_idhorario = $id_hora");

        //borrar segundo horario
        $result_hora = $db->query("DELETE FROM t_horario WHERE e_idhorario = $id_hora");

        //borrar tercero usuario
        $result_user = $db->query("DELETE FROM t_usuario WHERE e_idempleado = $id_emp");

        //borrar cuarto empleado
        $result_emp = $db->query("DELETE FROM t_empleado WHERE e_idempleado = $id_emp");

        if($result_emp && $result_hora && $result_dias && $result_user) {
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