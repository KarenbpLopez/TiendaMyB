<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $id = $_REQUEST['id_cargo'];

    $result = $db->query("SELECT * FROM t_cargo WHERE e_idcargo = $id");

    if($result) {
        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' => $row[0],
                'cargo' => $row[1],
                'salario' => $row[2]
            );
        }

        $json_string = json_encode($json);

        echo $json_string;
    }
    else {
        echo -1;
    }
?>