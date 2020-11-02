<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $id = $_REQUEST['id_proveedor'];

    $result = $db->query("SELECT * FROM t_proveedor WHERE e_idproveedor = $id");

    if($result) {
        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' => $row[0],
                'nombre' => $row[1],
                'telefono' => $row[2]
            );
        }

        $json_string = json_encode($json);

        echo $json_string;
    }
    else {
        echo -1;
    }
?>