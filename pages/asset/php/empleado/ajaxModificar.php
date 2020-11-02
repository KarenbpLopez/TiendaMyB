<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_emp = $_REQUEST['id_emp'];
        $id_hora = $_REQUEST['id_hora'];

        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $telefono = $_REQUEST['telefono'];
        $dui = $_REQUEST['dui'];
        $direccion = $_REQUEST['direccion'];
        $cargo = $_REQUEST['cargo'];
        $hora_inicio = $_REQUEST['hora_inicio'];
        $hora_fin = $_REQUEST['hora_fin'];

        //dias laborales
        $dia_laborales = explode(",", $_REQUEST['dias_laborales']);

        //COMIENZA
        $db->autocommit(FALSE);

        //actualizar primero empleado
        $result_emp = $db->query("UPDATE t_empleado SET c_dui='$dui',c_nombre='$nombre',c_apellido='$apellido',c_direccion='$direccion',c_telefono='$telefono',e_idcargo=$cargo WHERE e_idempleado = $id_emp");

        //actualizar segundo horario
        $result_hora = $db->query("UPDATE t_horario SET c_horainicio='$hora_inicio',c_horafin='$hora_fin' WHERE e_idhorario = $id_hora");

        //eliminar los dias anteriores e insertar los dias
        $delete_dias = $db->query("DELETE FROM t_diashorario WHERE e_idhorario = $id_hora");

        $cont = 0; //verificar si existio errores
        foreach($dia_laborales as $x) {
            if($x != "" && $x != null) {
                //agregar nuevamente
                $result_dias = $db->query("INSERT INTO t_diashorario(e_idhorario, e_dia) VALUES ($id_hora, $x)");
                
                if(!$result_dias) {
                    $cont++;
                }
            }
        }

        if($result_emp && $result_hora && $delete_dias && $cont == 0) {
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