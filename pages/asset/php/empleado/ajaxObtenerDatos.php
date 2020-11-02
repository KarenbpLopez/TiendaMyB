<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $id = $_REQUEST['id_emp'];

    $result = $db->query("SELECT e.e_idempleado, e.c_dui, e.c_nombre, e.c_apellido, e.c_direccion, e.c_telefono, e.e_idcargo, h.c_horainicio, h.c_horafin, dh.e_dia FROM t_empleado as e INNER JOIN t_horario as h ON e.e_idempleado = h.e_idempleado INNER JOIN t_diashorario as dh ON h.e_idhorario = dh.e_idhorario WHERE e.e_idempleado = $id");

    if($result) {
        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' => $row[0],
                'dui' => $row[1],
                'nombre' => $row[2],
                'apellido' => $row[3],
                'direccion' => $row[4],
                'telefono' => $row[5],
                'cargo' => $row[6],
                'hora_inicio' => $row[7],
                'hora_fin' => $row[8],
                'dia_laboral' => $row[9]
            );
        }

        $json_string = json_encode($json);

        echo $json_string;
    }
    else {
        echo -1;
    }
?>