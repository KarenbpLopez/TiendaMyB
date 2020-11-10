<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $id = $_REQUEST['id_user'];

    $result = $db->query("SELECT u.e_idusuario,u.c_nombreusuario,e.e_idempleado,CONCAT(e.c_nombre, ' ',e.c_apellido) as nombre,u.c_correo FROM t_usuario as u INNER JOIN t_empleado as e ON u.e_idempleado = e.e_idempleado WHERE u.e_idusuario = $id");
                                                                //,u.ty_nivel
    if($result) {
        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' => $row[0],
                'usuario' => $row[1],
                //'nivel' => $row[2],
                'id_emp' => $row[2],
                'nombre_emp' => $row[3],
                'correo' => $row[4]
            );
        }

        $json_string = json_encode($json);

        echo $json_string;
    }
    else {
        echo -1;
    }
?>