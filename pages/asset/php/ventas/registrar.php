<?php
    session_start();
    error_reporting(0);
    ini_set('date.timezone','America/El_Salvador');
    
    //isset($_POST)
    if(isset($_POST)) {
        include "../../../conexion_db.php";

        //Primero obtener los datos para ventas
        $fecha = date("Y-m-d H:i:s");
        $id_emp = $_SESSION["id_emp"];
        $id_cliente = $_POST["cliente_factura"];

        //se comienza una transaccion
        $db->autocommit(FALSE);

        $result_venta = $db->query("INSERT INTO t_venta (dt_fecha, e_idempleado) VALUES ('$fecha',$id_emp)");
        //obtener el id del registro
        $id_venta = $db->insert_id;

        //registrar venta en cliente
        $result_ventacliente = $db->query("INSERT INTO t_ventacliente (e_idcliente, e_idventa) VALUES ($id_cliente,$id_venta)");

        if($result_venta && $result_ventacliente) {
            //obtener los datos para cada registro en detalle
            $cantidades = $_POST["cantidades_POST"];
            $precios = $_POST["precio_POST"];
            $productos = $_POST["productos_POST"];

            //Este descuento no es el porcentaje, sino el precio*descuento/100
            $descuentos = $_POST["descuentos_registro"];

            $tipo_venta = intval($_POST["tipo_pago_POST"]); //Tipo de venta

            //obtener la cantidad de registros
            $longitud = count($cantidades);
            $contador = 0; // Este contador sirve para saber si hubo fallos en los registros de detalle
            
            $result_detalleventa = "";
            $result_detalleproducto = "";

            for ($i=0; $i < $longitud; $i++) { 
                //se obtiene el descuento
                $desc = intval($cantidades[$i])*floatval($precios[$i])*(floatval($descuentos[$i])/100);


                //tipo de venta... 0 = contado ; 1 = cheque

                $result_detalleventa = $db->query("INSERT INTO t_detalleventa (e_cantidad, db_precio, descuentos, ty_tipoventa, e_idventa, e_idproducto) VALUES ($cantidades[$i],'$precios[$i]', '$desc', $tipo_venta, $id_venta, $productos[$i])");

                //descontar del stock
                $nuevo_stock = intval($cantidades[$i]);
                $result_detalleproducto = $db->query("UPDATE t_detalleproducto SET e_cantidad = e_cantidad-$nuevo_stock WHERE e_idproducto = $productos[$i]");

                if(!$result_detalleventa && !$result_detalleproducto) {
                    $contador++;
                }
            }

            if($contador == 0) {
                //Abrira la factura en una nueva ventana y llevara a la siguiente
                $db->commit();
                echo "<script>
                window.open('../../../reportes/factura.php?id=$id_venta','_blank');
                window.location.href = '../../../cajero.php';
                </script>";
                //header("Location: ../../../reportes/factura.php?id=$id_venta");
            }
            else {
                $db->rollback();
                header("Location: ../../../cajero.php");
            }
        }
        else {
            $db->rollback();
            header("Location: ../../../cajero.php");
        }

        $db->autocommit(TRUE);
        $db->close();
    }
    else {
        header("Location: ../../../cajero.php");
    }
?>