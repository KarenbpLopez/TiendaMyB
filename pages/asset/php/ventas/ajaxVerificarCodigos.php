<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $codigo = $_REQUEST['codigo'];
    $solicitada = $_REQUEST['solicitada']; //Muestra la cantidad de productos que se tiene en la lista

    //SELECT p.e_idproducto,p.c_nombreproducto,p.c_codigo,p.e_precioventa,dp.e_cantidad FROM t_producto as p INNER JOIN t_detalleproducto as dp ON p.e_idproducto = dp.e_idproducto WHERE p.c_codigo = '$codigo' GROUP BY p.e_idproducto HAVING dp.e_cantidad > 0

    $result = $db->query("SELECT p.e_idproducto,p.c_nombreproducto,p.c_codigo,p.e_precioventa,dp.e_cantidad FROM t_producto as p INNER JOIN t_detalleproducto as dp ON p.e_idproducto = dp.e_idproducto WHERE p.c_codigo = '$codigo'");

    if($result->num_rows > 0) {
        $json_string = "";

        while($row = mysqli_fetch_array($result)) {
            if($row[4] > 0 && $solicitada < $row[4]) {
                $json = array();

                $json[] = array(
                    'id' => $row[0],
                    'producto' => $row[1],
                    'codigo' => $row[2],
                    'precio' => $row[3]
                );

                $json_string = json_encode($json);
            }
            else {
                $json_string = -2;
            }
        }

        echo $json_string;
    }
    else {
        echo -1;
    }
?>