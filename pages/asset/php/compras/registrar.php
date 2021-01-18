<?php
    session_start();
    error_reporting(0);
    ini_set('date.timezone','America/El_Salvador');
    
    if(isset($_POST)) {
        include "../../../conexion_db.php";

        //Primero obtener los datos para compras
        $fecha = date("Y-m-d H:i:s");
        $id_proveedor = $_POST["proveedor_POST"];
        $total = $_POST["total_POST"];

        //se comienza una transaccion
        $db->autocommit(FALSE);

        $result_compra = $db->query("INSERT INTO t_compra (e_fecha, e_idproveedor, e_total) VALUES ('$fecha',$id_proveedor, $total)");
        //obtener el id del registro
        $id_compra = $db->insert_id;

        if($result_compra) {
            //obtener los datos para cada registro en detalle
            $productos = $_POST["producto_POST"];
            $paquetes = $_POST["paquete_POST"];
            $unidades_paquete = $_POST["unidades_paquete_POST"];
            $cantidades = $_POST["cantidad_POST"];
            $fecha_vencimiento = $_POST["fecha_POST"];
            $precio_compra = $_POST["precio_POST"];

            //obtener la cantidad de registros
            $longitud = count($productos);
            $contador = 0; // Este contador sirve para saber si hubo fallos en los registros de detalle
            
            $result_detalleproducto = "";
            $result_detallecompra = "";

            for ($i = 0; $i < $longitud; $i++) {
                //verificar si existe el producto para solo sumar, sino inserta
                $result_comprobarexistencia = $db->query("SELECT * FROM t_detalleproducto WHERE e_idproducto = $productos[$i]");

                if($result_comprobarexistencia->num_rows == 0) {
                    $result_detalleproducto = $db->query("INSERT INTO t_detalleproducto(e_cantidad, e_unidadporpaquete, e_fechavencimiento, e_tipopaquete, e_preciocompra, e_idproducto) VALUES($cantidades[$i],$unidades_paquete[$i],'$fecha_vencimiento[$i]','$paquetes[$i]',$precio_compra[$i],$productos[$i])");
                }
                else {
                    $result_detalleproducto = $db->query("UPDATE t_detalleproducto SET e_cantidad = e_cantidad+$cantidades[$i], e_unidadporpaquete = $unidades_paquete[$i], e_fechavencimiento = '$fecha_vencimiento[$i]', e_tipopaquete = '$paquetes[$i]', e_preciocompra = $precio_compra[$i] WHERE e_idproducto = $productos[$i]");
                }

                //Registrara el detalle de la compra
                $sub_total = floatval($precio_compra[$i])*intval($cantidades[$i]);

                $result_detallecompra = $db->query("INSERT INTO t_detallecompra(e_cantidad, e_idproducto, e_subtotal, e_idcompra) VALUES($cantidades[$i],$productos[$i],'$sub_total',$id_compra)");

                if(!$result_detalleproducto || !$result_detallecompra) {
                    $contador++;
                }
            }

            if($contador == 0) {
                $db->commit();
                header("Location: ../../../listacompra.php");
            }
            else {
                $db->rollback();
                header("Location: ../../../listacompra.php");
            }
        }
        else {
            $db->rollback();
            header("Location: ../../../listacompra.php");
        }

        $db->autocommit(TRUE);
        $db->close();
    }
    else {
        header("Location: ../../../listacompra.php");
    }
?>