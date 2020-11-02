<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
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

        //insertar primero empleado
        $result_emp = $db->query("INSERT INTO t_empleado(c_dui, c_nombre, c_apellido, c_direccion, c_telefono, e_idcargo) VALUES ('$dui','$nombre','$apellido','$direccion','$telefono',$cargo)");
        $id_emp = $db->insert_id;

        //insertar segundo horario
        $result_hora = $db->query("INSERT INTO t_horario(c_horainicio, c_horafin, e_idempleado) VALUES ('$hora_inicio','$hora_fin', $id_emp)");
        $id_horario = $db->insert_id;

        //insertar los dias
        $cont = 0; //verificar si existio errores
        foreach($dia_laborales as $x) {
            if($x != "" && $x != null) {
                $result_dias = $db->query("INSERT INTO t_diashorario(e_idhorario, e_dia) VALUES ($id_horario, $x)");
                
                if(!$result_dias) {
                $cont++;
                }
            }
        }

        if($result_emp && $result_hora && $cont == 0) {
            echo $id_emp.",".$id_horario;

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