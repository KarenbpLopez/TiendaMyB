<?php session_start();


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Reporte de Ventas</title>
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
function ocultar(){
	document.formulario.boton.style.visibility="hidden";
	print();
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
	    <th align="center" class="titulotabla">REPORTE DE VENTAS</th><br>
      	    </tr>
      <tr><th align="center" class="titulotabla">Fecha generaci&oacute;n: <?php echo date("d-m-Y"); ?></th></tr>
     <tr>
        <th align="center" class="titulotabla">Hora generado: <?php echo date("h:i:s "); ?></th>
     </tr>
	</table>
	

  <table border="1" class="formatocontenidotabla" cellspacing=0 cellpadding=0 rules="all">
  <tr>
	    <td width="40"  align="center"><strong>N</strong></td>
	    <td width="200"  align="center"><strong>FECHA</strong></td>
        <td width="100"  align="center"><strong>EMPLEADO</strong></td>
        
	  </tr>
  </table>

</div>
<?php }

include "conexion_db.php";


  $resultado=$db->query("SELECT
  t_venta.e_idventa,
  t_venta.dt_fecha,
  t_empleado.c_nombre
  FROM
  t_venta
  INNER JOIN t_empleado
  ON t_venta.e_idempleado = t_empleado.e_idempleado);
  
  if($resultado){
    while ($fil=$resultado->fetch_object()) {
    //   $anio=$fil->anio;
    //   $idperiodo=$fil->idperiodo;
    }
  }
$contador    = 0;
$numPagina   = 0;
$numeroFilas = 40; //Cuantas filas por pagina
$bandera     = false;

if (true) {
    $sql = "SELECT
    t_usuario.c_nombreusuario, 
    t_empleado.c_nombre, 
    t_usuario.c_correo
  FROM
    t_usuario
    INNER JOIN
    t_empleado
    ON 
      t_usuario.e_idempleado = t_empleado.e_idempleado";
} else {
    $sql = "SELECT
    t_usuario.c_nombreusuario, 
    t_empleado.c_nombre, 
    t_usuario.c_correo
  FROM
    t_usuario
    INNER JOIN
    t_empleado
    ON 
      t_usuario.e_idempleado = t_empleado.e_idempleado";
}

$result = $db->query($sql);
if ($result) {

    //obtener el numero de filas retornadas por la consulta
    $cuantasPaginas = mysqli_num_rows($result);

 ?>
 <form id="formulario" name="formulario" method="post" action="">
  <div align="left">
    <input type="button" name="boton" id="boton" style="top: -10px" class="btn ripple-infinite btn-round btn-info" value="Imprimir" onclick="ocultar()" />
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
        echo "<td width='200'  align='center'>" . $fila->c_nombreusuario . "</td>";
        echo "<td width='100'  align='center'>" . $fila->c_nombre . "</td>";
        echo "<td width='100'  align='center'>" . $fila->c_correo . "</td>";
        
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