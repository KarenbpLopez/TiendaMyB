<?php
	include '../conexion_db.php';

	$id = $_REQUEST['id'];

	ini_set('date.timezone',  'America/El_Salvador');

	//include 'plantillaCliente.php';
	require 'fpdf/fpdf.php';

	class PDF extends FPDF
	{
		function Header(){


		}

		function Footer()
		{


		}
	}

	//$pdf = new PDF('L','mm',array(137 , 214));
	$pdf = new PDF('P','mm', array(137 , 214));
	$pdf->AliasNbPages();

	$pdf->AddPage();

	$query_s= $db->query("SELECT v.dt_fecha,CONCAT(e.c_nombre,' ',e.c_apellido) as empleado, CONCAT(c.c_nombre,' ',c.c_apellido) as cliente, c.c_direccion FROM t_ventacliente as vc
	INNER JOIN t_venta as v ON vc.e_idventa = v.e_idventa
	INNER JOIN t_cliente as c ON vc.e_idcliente = c.e_idcliente
	INNER JOIN t_empleado as e ON v.e_idempleado = e.e_idempleado WHERE vc.e_idventa = $id");

	$pdf->Image('../images/factura.jpg', 1, 1, 137 );
	//Variable aux, hace que se mueva hacia abajo.
	$y = 88;
	$total = 0;
	$total_precios = 0;

	while($row = mysqli_fetch_array($query_s)) {

			$pdf->SetFont('times','B',12);
			$pdf->SetXY(24,59);

			$pdf->SetFillColor(255, 255, 255);
			$pdf->SetTextColor(0,0,0);

			//Este es para el nombre.
			$pdf->SetXY(23,46);
			$pdf->Cell(50,2,utf8_decode($row[2]),0,0,'D',1);

			//Este es para la direccion.
			$pdf->SetXY(27,58);
      		$pdf->SetFont('times','B',10);
			$pdf->Cell(70,2,utf8_decode($row[3]) ,0,0,'D',1);

			//Este es para la fecha.
      		$pdf->SetFont('times','B',14);
			$fecha = date('d/m/Y', strtotime($row[0]));
      		$pdf->SetXY(20,39);
			$pdf->Cell(5,3,$fecha,0,0,'D',1);

			//Este es para el empleado.
			$pdf->SetXY(42,64);
      		$pdf->SetFont('times','B',12);
			$pdf->Cell(25,2,$row[1] ,0,0,'D',1);

			//Para el id de la nota.
			$valor = "";

			if($id<9) {
				$valor = "00000".$id;
			}
			if($id>=10 && $id<99) {
				$valor = "0000".$id;
			}
			if($id>=100 && $id<999) {
				$valor = "000".$id;
			}
			if($id>=1000 && $id<9999) {
				$valor = "00".$id;
			}
			if($id>=10000 && $id<99999) {
				$valor = "0".$id;
			}
			if($id>=100000 && $id<999999) {
				$valor = $id;
			}

      //Para darle id.
			$pdf->SetXY(102,23);
			$pdf->SetTextColor(178,25,56);
			$pdf->SetFont('times','B',14);
			$pdf->Cell(30,10,$valor,0,0,'D',1);

			//Cambia al color y tamaño nuevamente.
			$pdf->SetTextColor(0,0,0);

      $total = 0;

	  $query_detalle = $db->query("SELECT dv.e_iddetalleventa, dv.e_cantidad, dv.db_precio, p.c_nombreproducto FROM t_detalleventa as dv INNER JOIN t_producto as p ON dv.e_idproducto = p.e_idproducto WHERE dv.e_idventa = $id");
	  
	  $contador = 0;

      while($fila = mysqli_fetch_array($query_detalle)) {
		//para la cantidad
		$pdf->SetFont('times','B',12);
        $pdf->SetXY(9,77+$contador);
		$pdf->Cell(5,2,$fila[1],0,0,'D',1);

		//para la descripcion
		$pdf->SetFont('times','B',10);
		$pdf->SetXY(20,77+$contador);
		$pdf->Cell(5,2,utf8_decode($fila[3]),0,0,'D',1);

		//para el costo unitario
		$pdf->SetFont('times','B',10);
		$pdf->SetXY(84,77+$contador);
		$pdf->Cell(2,2,"$".$fila[2],0,0,'D',1);

		$contador = $contador+5;
		$total = $total + floatval($fila[2])*intval($fila[1]);
	  }

	  	//Para el total
	  	$pdf->SetFont('times','B',12);
    	$pdf->SetXY(117,191);
		$pdf->Cell(5,2,"$".$total,0,0,'D',1);
	}

	$pdf->Output();

?>