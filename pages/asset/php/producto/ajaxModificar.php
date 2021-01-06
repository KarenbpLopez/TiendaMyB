<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $id_producto = $_REQUEST['id_producto'];

        $nombre = $_REQUEST['nombre'];
        $porcentaje = $_REQUEST['porcentaje'];
        $precio = $_REQUEST['precio'];
        $marca = $_REQUEST['marca'];
        $categoria = $_REQUEST['categoria'];

        //COMIENZA
        $db->autocommit(FALSE);

        //actualizar producto
        $result_producto = $db->query("UPDATE t_producto SET c_nombreproducto = '$nombre',e_porcentajeganancia = '$porcentaje',e_precioventa = '$precio',e_idmarca = '$marca',e_idcategoria = '$categoria' WHERE e_idproducto = $id_producto");

        if($result_producto) {
            echo $id_producto;

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