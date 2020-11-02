<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $id = $_REQUEST['id_cliente'];

    $result = $db->query("SELECT * FROM t_cliente WHERE e_idcliente = $id");

    if($result) {
        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' => $row[0],
                'dui' => $row[1],
                'nombre' => $row[2],
                'apellido' => $row[3],
                'direccion' => $row[4],
                'telefono' => $row[5]
            );
        }

        $json_string = json_encode($json);

        echo $json_string;
    }
    else {
        echo -1;
    }
?>