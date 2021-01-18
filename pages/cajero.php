<?php
  include "asset/php/sesion/validar_sesion.php";
  ini_set('date.timezone','America/El_Salvador');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M Y B</title>
 
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->
	<!-- end: Css -->

	<link rel="icon" type="image/png" href="images/icons/favicon3.png"/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="css/animate.min.css"/>

    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
  </head>

 <body id="mimin" class="dashboard">
      <!-- start: Header -->
       <?php include "header.php"; ?>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <?php include "menu.php"; ?>
          <!-- end: Left Menu -->




         

      </div>

      
     <!--inicio decontent-->
      <div id="content">
              

            <form action="asset/php/ventas/registrar.php" method="POST" name="form_guardar_venta">
              <input type="hidden" id="cliente_factura" name="cliente_factura" value="">

              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel1">
                    <div class="panel-heading"><h3 align="center">Venta</h3>
                     <div class="row">
                     <div class="col-md-6" align="left" style="padding-right: 25px">
                          <?php
                            include "conexion_db.php";

                            $emp = $_SESSION["id_emp"];
                            $name_emp = "";

                            $result = $db->query("SELECT * FROM t_empleado WHERE e_idempleado = $emp");
                            while($row = mysqli_fetch_array($result)) {
                                $name_emp = $row[2]." ".$row[3];
                            }
                            
                          ?>
                           <label >Empleado</label>
                          <input style=" width: 40%;height: 35px;border-radius: 11px !important;" disabled="true" type="Text" class="roundtext2" value="<?php echo $name_emp; ?>"/>
                      
                        </div>
                        <div class="col-md-6" align="right" style="padding-right: 35px">
                           <label >Fecha</label>
                          <input style=" width: 30%;height: 35px;border-radius: 11px !important;" disabled="true" type="date" class="roundtext2" value="<?php echo date("Y-m-d"); ?>"/>
                      
                        </div>
                        </div>
                     </div>
                    <div class="panel-body">
                      <div class="row" style="padding-left: 2%; width: 100%">
                      <div  class="col-md-12" style="border: 1px solid #ccc;">
                         <div class="form-group">
                        <label style="margin-top: 15px;">Código</label>
                        <input style="width: 35%; margin-left: 10px;display: inline;"  type="text" class="form-control roundtext2" id="codigoProducto" autocomplete="off">
                            
                        <button style="margin-left: 10px;width: 80px;display: inline" type="button" class="form-control btn-success roundbotton" id="verificarCodigo">
                               <span class="fa fa-plus"></span> 
                              </button>
                        <label style="margin-top: 15px; margin-left: 50px;" >Cliente</label> 
                        <input style="width: 30%;display: inline" type="text" class="form-control roundtext2" id="cliente_registro" name="cliente_registro" list="lista_clientes" tag=""/ >
                        <datalist id="lista_clientes">
                        <?php
                          $result = $db->query("SELECT * FROM t_cliente ORDER BY c_nombre ASC LIMIT 10");

                          while($row = mysqli_fetch_array($result)) {
                            ?>
                            <option data-id="<?php echo $row[0]?>" value="<?php echo $row[2]." ".$row[3]?>">
                            <?php
                          }

                          $db->close();
                        ?>
                        </datalist>


                        <button onClick="window.open('listaCliente.php');" style="margin-left: 10px;width: 80px;display: inline" type="button" class="form-control btn-success roundbotton"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </div>  
                      <div class="form-group">
                        
                   

                        
                      </div>
                      </div>
                      </div>
                      <div class="row" style="padding-left: 2%; width: 100%" >
                      <div class="col-md-8" style="border: 1px solid #ccc;">

                      <table id="#" class="table table-striped" width="100%" cellspacing="0">
                        <thead>
                          <!-- star: Enc -->
                          <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Reducir</th>
                          </tr>
                          <!-- end: Enc -->
                        </thead>
                        <tbody id="actualizarProductos">
                        
                        </tbody>
                      </table>
                        
                      </div>
                      <div class="col-md-4" style="border: 1px solid #ccc;height: 250px">
                         <div style="background: #ccc;position: relative;left: -15px;top: -20px;height: 50px;width: 348px" >
                           <h2 style="color: black;text-align:right;padding-right: 10px;padding-top: 5px;font-size: 40px" id="total_grande_venta">$0.00</h2>
                         </div> 

                         
                         <div >
                        <label style="align-content: left">Sub Total</label>
                        <input style="float: right; height: 30px;width: 150px;display: inline;text-align: right;" disabled="true" class="form-control " type="text"  name="subtotal_venta" id="subtotal_venta" value="0.00"><br><br>

                        <label style="align-content: left">Descuento</label> 
                        <input style="float: right;height: 30px;width: 150px;display: inline;text-align: right;" disabled="true" class="form-control " type="text" name="descuento_venta" id="descuento_venta" value="0"><br><br>

                        <label style="align-content: left">Total</label> 
                        <input style="float: right;height: 30px;width: 150px;display: inline;text-align: right;" disabled="true" class="form-control " type="text" name="total_venta" id="total_venta" value="0.00"><br><br>
                       
                        <button type="reset" style="width: 128px;display: inline;float: left;" class="form-control btn-danger roundbotton2" id="btn-cancelar-venta"><i class="fa fa-times" aria-hidden="true" ></i>&nbsp;Cancelar</button>
                         <button style="width: 125px;display: inline;float: right;" class="form-control btn-success roundbotton2" id="btn-registrar-venta"><i class="fa fa-floppy-o" aria-hidden="true"  ></i>&nbsp;Guardar</button>
                         </div><br><br>

                    
                  </div>
                  <div class="row" style="padding-left: 2%; width: 100%" >
                    <div class="col-md-12">
                      
                    </div>
                  </div>
                </div>
              </div>  
              </div>
            </form>

            </div>
            <!--final de content-->

    <!-- start: Javascript -->
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/jquery.ui.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/fecha.js"></script>
   
    
    <!-- plugins -->
    <script src="asset/js/plugins/moment.min.js"></script>
    <script src="asset/js/plugins/fullcalendar.min.js"></script>
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="asset/js/plugins/jquery.vmap.min.js"></script>
    <script src="asset/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="asset/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="asset/js/plugins/chart.min.js"></script>


    <!-- custom -->
    <script src="asset/js/main.js"></script>

    <?php include "asset/php/sesion/script_logout.php"; ?>

     <script>
      //Metodos normales de javascript
      verificarListado = function(cod) {
        let codigos = document.getElementsByClassName("codigos-ingresados");

        //Estas son las cantidades que se ven
        let cantidades = document.getElementsByClassName("cantidades_registro");
        //Estas son las cantidades que se envian al servidor
        let cantidades_server = document.getElementsByName("cantidades_POST[]");

        //nuevo valor
        var nuevo = 0;
        
        for(i = 0 ; i < codigos.length ; i++) {
          if(codigos[i].getAttribute("tag") == `cod_${cod}`) {
            nuevo = parseInt(cantidades[i].innerHTML) + 1;

            cantidades[i].innerHTML = nuevo;
            cantidades_server[i].value = nuevo;
            actualizarTotal();

            return true;
          }
        }
        
        return false;
      };

      actualizarTotal = function() {
        let cantidades = document.getElementsByClassName("cantidades_registro");
        let precios = document.getElementsByClassName("precio_registro");
        let descuentos = document.getElementsByName("descuentos_registro[]");

        var total = 0;
        var descuento = 0;
        
        for(i = 0 ; i < precios.length ; i++) {
          total += parseFloat(cantidades[i].innerHTML)*parseFloat(precios[i].innerHTML.replace("$",""));
          descuento += parseFloat(precios[i].innerHTML.replace("$","")) * parseFloat(cantidades[i].innerHTML) * (parseFloat(descuentos[i].value)/100);
        }

        total = Math.round(total*100)/100;
        descuento = Math.round(descuento*100)/100;

        $("#total_grande_venta").text("$"+(total - descuento));
        $("#subtotal_venta").val(total);
        $("#total_venta").val(total - descuento);
        $("#descuento_venta").val(descuento);
      };

      obtenerCantidadActual = function(cod) {
        let codigos = document.getElementsByClassName("codigos-ingresados");
        let cantidades = document.getElementsByClassName("cantidades_registro");

        for(i = 0 ; i < codigos.length ; i++) {
          if(codigos[i].getAttribute("tag") == `cod_${cod}`) {
            return parseInt(cantidades[i].innerHTML);
          }
        }

        return 0;
      };

      //Metodos con jQuery
      $(document).ready(function () {

        //Para saber que cliente es.
        $("#cliente_registro").on("input", function () { 
          let valor = $("#cliente_registro").val();
          let valor_list = $('#lista_clientes').find('option[value="'+valor+'"]').data('id');

          if(valor_list != undefined && valor_list != null) {
            $("#cliente_factura").attr("value", valor_list);
          }
          else {
            $("#cliente_factura").attr("value", "");
          }
        });
        
        //Al hacer click en agregar codigo se busca y agrega si existe el producto
        $("#verificarCodigo").click(function (e) { 
          e.preventDefault();
          
          if($("#codigoProducto").val() != "") {
            let actual = obtenerCantidadActual($("#codigoProducto").val());

            $.ajax({
              type: "POST",
              url: "asset/php/ventas/ajaxVerificarCodigos.php",
              data: {
                codigo: $("#codigoProducto").val(),
                solicitada: actual
              },
              success: function (response) {
                if(response != -1 && response != -2) {
                  var datos = JSON.parse(response);
    
                  datos.forEach(x => {
                    //se verifica si existe el producto para ser sumado, sino solo se agrega
                    var existe = verificarListado(x.codigo);

                    if(!existe) {
                      $("#actualizarProductos").append(`
                      <tr>
                          <td>
                            <input type="hidden" class="form-control" name="codigos_POST[]" value="${x.codigo}" readonly/>
                            <label class="codigos_registro">${x.codigo}</label>
                          </td>
                          <td>
                            <input type="hidden" class="form-control" name="productos_POST[]" value="${x.id}" readonly/>
                            <label class="productos_registro">${x.producto}</label>
                          </td>
                          <td tag="cod_${x.codigo}" class="codigos-ingresados">
                            <input type="hidden" class="form-control" name="cantidades_POST[]" value="1" readonly/>
                            <label class="cantidades_registro">1</label>
                          </td>
                          <td>
                            <input type="hidden" class="form-control" name="precio_POST[]" value="${x.precio}" readonly/>
                            <label class="precio_registro">${x.precio}</label>
                          </td>
                          <td>
                            <select name="descuentos_registro[]" class="form-control verificar-descuento" title="Descuento" tag="0">
                              <option value="0">0%</option>
                              <option value="10">10%</option>
                              <option value="20">20%</option>
                              <option value="30">30%</option>
                              <option value="40">40%</option>
                              <option value="50">50%</option>
                              <option value="60">60%</option>
                              <option value="70">70%</option>
                            </select>
                          </td>
                          <td>
                            <button type="button" class="form-control btn-danger roundbotton2 eliminar-producto" title="Reducir cantidad"><i class="fa fa-minus" aria-hidden="true"></i></button>
                          </td>
                        </tr>`);

                      actualizarTotal();
                    }
                  });
                }
                else {
                  if(response == -1) {
                    alert("Este codigo no existe en el inventario o esta descontinuado");
                  }
                  else {
                    alert("Se ha sobrepasado la capacidad del stock");
                  }
                }
              }
            });
          }
          else {
            alert("El codigo es necesario");
          }
        });

        //Aplicar descuento
        $(document).on("change", ".verificar-descuento", function () {
          actualizarTotal();
        });

        $(document).on("click", ".eliminar-producto", function (e) {
          e.preventDefault();
          
          let element = $(this)[0];
          let valor_actual = parseInt(element.parentElement.parentElement.childNodes[5].childNodes[1].value);

          if(valor_actual == 1) {
            if(confirm("¿Desea eliminar este producto por completo de la lista?")) {
              $(element.parentElement.parentElement).remove();
            }
          }
          else {
            element.parentElement.parentElement.childNodes[5].childNodes[1].value = valor_actual-1;
            element.parentElement.parentElement.childNodes[5].childNodes[3].innerHTML = valor_actual-1;
          }

          actualizarTotal();
        });

        $("#btn-registrar-venta").click(function (e) { 
          e.preventDefault();

          let productos = document.getElementsByName("productos_POST[]");
          
          if(productos.length > 0 && $("#cliente_factura").val() != "") {
            if(confirm("¿Esta seguro que desea finalizar la compra?")) {
              document.form_guardar_venta.submit();
            }
          }
          else {
            if(productos.length == 0) {
              alert("Debe ingresar productos primero");
            }
            if($("#cliente_registro").val() == "") {
              alert("Ingrese el nombre del cliente");
            }
          }
        });

        $("#btn-cancelar-venta").click(function (e) { 
          $("#actualizarProductos").html("");
          actualizarTotal();
        });
      });
     </script>
  <!-- end: Javascript -->
  </body>
</html>