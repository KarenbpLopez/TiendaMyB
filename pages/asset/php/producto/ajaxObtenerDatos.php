<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $id = $_REQUEST['id_producto'];

    $result = $db->query("SELECT * FROM t_producto WHERE e_idproducto = $id");
    // $result = $db->query("SELECT p.e_idproducto, p.c_nombreproducto, p.e_porcentajeganancia, p.e_precioventa, p.e_idmarca, p.e_idcategoria FROM t_producto as p  WHERE p.idproducto = $id ");
    if($result) {
        $json = array();
        while($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' => $row[0],
                'nombre' => $row[1],
                'codigo' =>$row[2],
                'porcentaje' => $row[3],
                'precio' => $row[4],
                'marca' => $row[5],
                'categoria' => $row[6]
                
            );
        }

        $json_string = json_encode($json);

        echo $json_string;
    }
    else {
        echo -1;
    }
?>