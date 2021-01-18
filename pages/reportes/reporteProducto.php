<?php session_start();


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title align="left">Reporte de Productos</title>
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
    <table  border="0" style="margin: 0 auto;">
        <tr>
	        <th align="center" class="titulotabla">TIENDA M Y B</th>
	    </tr>
        <tr>
	        <th align="center" class="titulotabla"></th>
        </tr>
        <tr>
	        <th align="center" class="titulotabla"></th>
        </tr><br>
        <tr>
	        <th align="center" class="titulotabla">Listado de Productos</th>
        </tr>
        <tr>
            <!-- <th align="left" class="titulotabla">Fecha generaci&oacute;n: <?php echo date("d-m-Y"); ?></th> -->
        </tr>
        <tr>
            <th align="left" class="titulotabla">Fecha generaci&oacute;n
                <?php 
                    $currentDateTime=date('m/d/Y H:i:s');
                    $newDateTime = date('d/m/Y    h:i A', strtotime($currentDateTime));
                    echo $newDateTime;
                    // echo date("h:i:s "); 
                ?>
            </th>
        </tr>
	</table>
    <br>
    <br>
	

    <table style="margin: 0 auto;" border="1" class="formatocontenidotabla" cellspacing=0 cellpadding=0 rules="all">
        <tr>
            <td width="40"  align="center"><strong>N</strong></td>
            <td width="200"  align="center"><strong>Producto</strong></td>
            <td width="80"  align="center"><strong>%Ganancia</strong></td>
            <td width="80"  align="center"><strong>Precio Venta</strong></td>
            <td width="150"  align="center"><strong>Marca</strong></td>
            <td width="150"  align="center"><strong>Categoría</strong></td>
            <td width="80"  align="center"><strong>Unidades</strong></td>
        </tr>
    </table>

</div>
<?php }

include "conexion_db.php";


  $resultado=$db->query("SELECT * FROM t_producto");
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
    // $sql = "SELECT p.e_idproducto,p.c_nombreproducto, p.e_porcentajeganancia, p.e_precioventa,m.c_nombremarca, c.c_nombrecategoria
    // FROM t_producto as p
    // INNER JOIN t_marca as m ON p.e_idmarca = m.e_idmarca
    // INNER JOIN t_categoria AS c ON p.e_idcategoria = c.e_idcategoria";
    $sql ="SELECT  p.e_idproducto, p.c_nombreproducto,p.c_codigo, p.e_porcentajeganancia, p.e_precioventa, m.c_nombremarca, c.c_nombrecategoria, (SELECT SUM(dp.e_cantidad*dp.e_unidadporpaquete) FROM t_detalleproducto as dp WHERE dp.e_idproducto = p.e_idproducto) as cantidad
                  FROM t_producto AS p 
                  INNER JOIN t_marca AS m ON p.e_idmarca = m.e_idmarca 
                  INNER JOIN t_categoria AS c ON p.e_idcategoria = c.e_idcategoria";
} else {
    $sql = "SELECT * FROM t_producto";
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
            echo "<table border='1' style='margin: 0 auto;' class='formatocontenidotabla' cellspacing='5' cellpadding='0' rules='all'>";
        }
        $contador++;
        echo "<tr style='height:20px;''>";
        echo "<td width='40'   align='center'>" . $contador . "</td>";
        echo "<td width='200'  align='center'>" . $fila->c_nombreproducto . "</td>";
        echo "<td width='80'  align='center'>" . $fila->e_porcentajeganancia . "</td> ";
        echo "<td width='80'  align='center'>" . $fila->e_precioventa . "</td> ";
        echo "<td width='150'  align='center'>" . $fila->c_nombremarca . "</td> ";
        echo "<td width='150'  align='center'>" . $fila->c_nombrecategoria . "</td> ";
        echo "<td width='80'  align='center'>" . $fila->cantidad . "</td> ";
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