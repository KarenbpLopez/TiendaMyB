<?php
    error_reporting(0);
    include "../../../conexion_db.php";

    if(isset($_POST)) {
        $nombre = $_REQUEST['nombre'];
        $codigo = $_REQUEST['codigo'];
        $porcentaje = $_REQUEST['porcentaje'];
        $precio = $_REQUEST['precio'];
        $marca = $_REQUEST['marca'];
        $categoria = $_REQUEST['categoria'];
        

        //COMIENZA
        $db->autocommit(FALSE);

        //insertar producto
        $result_producto = $db->query("INSERT INTO t_producto(c_nombreproducto, c_codigo, e_porcentajeganancia, e_precioventa, e_idmarca, e_idcategoria) VALUES ('$nombre','$codigo','$porcentaje','$precio','$marca','$categoria')");
        $id_producto = $db->insert_id;

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