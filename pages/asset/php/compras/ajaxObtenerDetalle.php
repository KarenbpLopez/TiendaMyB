<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    $compra = $_REQUEST['compra'];

    $result = $db->query("SELECT dc.e_cantidad, p.c_nombreproducto, p.e_precioventa, dc.e_subtotal FROM t_detallecompra as dc INNER JOIN t_producto as p ON dc.e_idproducto = p.e_idproducto WHERE e_idcompra = '$compra'");

    if($result->num_rows > 0) {
        $json_string = "";

        while($row = mysqli_fetch_array($result)) {
            $json = array();

            $json[] = array(
                'producto' => $row[1],
                'cantidad' => $row[0],
                'precio' => $row[2],
                'subtotal' => $row[3]
            );

            $json_string = json_encode($json);
        }

        echo $json_string;
    }
    else {
        echo -1;
    }
?>