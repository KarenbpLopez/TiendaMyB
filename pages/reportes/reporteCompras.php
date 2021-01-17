<?php session_start();


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reporte de Compras</title>
<style type="text/css">
.formatocontenidotabla {
	font-family: Courier, Courier, monospace;
	font-size: 13px;
}
</style>
        <style type="text/css">
        .titulotabla {
	font-family: Helvetica, Arial, sans-serif;
	font-size: 15px;
}
        </style>
<style type="text/css">
    @media all {
   div.saltopagina{
      display: none;
   }
}

@media print{
   div.saltopagina{
      display:block;
      page-break-before:always;
   }
}
</style>
<script type="text/javascript">
function ocultar() {
    document.formulario.boton.style.visibility="hidden";
	window.print();
	document.formulario.boton.style.visibility="visible";
}
 </script>
  <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php function encabezado($ordenar)
{
 
  
    ?>
<div id="reporte">
  <table  border="0">
  <tr>
	    <th align="center" class="titulotabla">TIENDA M Y B</th>
	</tr>
	  <tr>
	    <th align="center" class="titulotabla">REPORTE DE CARGOS</th><br>
      	    </tr>
      <tr><th align="center" class="titulotabla">Fecha generaci&oacute;n: <?php echo date("d-m-Y"); ?></th></tr>
     <tr>
        <th align="center" class="titulotabla">Hora generado: <?php echo date("h:i:s "); ?></th>
     </tr>
	</table>
	

  <table border="1" class="formatocontenidotabla" cellspacing=0 cellpadding=0 rules="all">
  <tr>
	    <td width="40"  align="center"><strong>N</strong></td>
	    <td width="200"  align="center"><strong>FECHA COMPRA</strong></td>
	    <td width="100"  align="center"><strong>PROVEEDOR</strong></td>
        <td width="100"  align="center"><strong>VALOR DE COMPRA</strong></td>
	  </tr>
  </table>

</div>
<?php }

include "conexion_db.php";

$contador    = 0;
$numPagina   = 0;
$numeroFilas = 40; //Cuantas filas por pagina
$bandera     = false;

$sql = "SELECT c.e_idcompra,c.e_fecha,p.c_nombre,c.e_total FROM t_compra as c INNER JOIN t_proveedor as p ON c.e_idproveedor = p.e_idproveedor";

$result = $db->query($sql);
if ($result) {

    //obtener el numero de filas retornadas por la consulta
    $cuantasPaginas = mysqli_num_rows($result);

 ?>
 <form id="formulario" name="formulario" method="post" action="">
  <div align="left">
    <input type="button" name="boton" id="boton" style="top: -10px" class="btn ripple-infinite btn-round btn-info" value="Imprimir" onclick="ocultar();" />
  </div>
</form>


<?php
    while ($fila = $result->fetch_object()) {
        if ($contador % $numeroFilas == 0) {
            encabezado("");
            echo "<table border='1' class='formatocontenidotabla' cellspacing='5' cellpadding='0' rules='all'>";
        }
        $contador++;
        echo "<tr style='height:20px;''>";
        echo "<td width='40'   align='center'>" . $contador . "</td>";
        echo "<td width='200'  align='center'>" . $fila->e_fecha . "</td>";
        echo "<td width='100'  align='center'>" . $fila->c_nombre . "</td>";
        echo "<td width='100'  align='center'>$" . $fila->e_total . "</td>";
        echo "</tr>";

        $bandera = false;
        if ($contador % $numeroFilas == 0) {
            $numPagina++;
            echo "</table>";
            echo "<br>";
            echo "<div  align='right' class='formatocontenidotabla'>" . $numPagina . " de " . ceil($cuantasPaginas / $numeroFilas) . "</div>";
            if ($numPagina != ceil($cuantasPaginas / $numeroFilas)) {
                echo "<div class='saltopagina'></div>";
            }

            $bandera = true;
        }
    }
}

if (!$bandera) {

    echo "</table>";
    echo "<br>";
    echo "<div  align='right' class='formatocontenidotabla'>" . ($numPagina + 1) . " de " . ceil($cuantasPaginas / $numeroFilas) . "</div>";
}
?>

</body>

</html>


