<?php
  include "asset/php/sesion/validar_sesion.php";
  include "conexion_db.php";
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

  <link rel="shortcut icon" href="asset/img/logomi.png">
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

      <div id="content">
               

              <div class="page-titles">
                    <div class="col-md-11 col-10 ">
              
                        <div class="container">
           
            
           <div style="top:20px !important;float:right;padding-right: 60px;padding-left: 10px; position: relative;">
             <button  style="width: 150px;" type="button" class="form-control btn-success roundbotton" data-target="#modalNuevo" data-toggle="modal" >
            <i class="fa fa-user-plus" aria-hidden="true" ></i>
              Nueva Compra</button>
           </div> 
            <div style="top:20px !important;float:right;padding-left:20px;position: relative;">
             <button  type="button" style="width: 120px;" class="form-control btn-info roundbotton"  type="button"    data-toggle="modal" onclick="location.href='reportes/reporteCompras.php'">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
              Reporte</button>
           </div>
             <div style="top:20px;float:right;padding-left:0px !important;" class="col-md-6">


           <input type="text" class="form-control input-md roundtext"  id="busq" placeholder="&#xf002;&nbsp;Buscar"> <a class="srh-btn">    
           </div>

            

           
          
            <div style="width:150px">   
                           
              
            </div>
           
        </div>
                    </div>
                    
                </div>  

              
            </div>
     <!--inicio decontent-->
      <div id="content">
              

              <!--inicio de tabla -->
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel1">
                    <div class="panel-heading"><h3>Lista De Compras</h3>
                     

                    </div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                           <td>N°</td>
                           <td>Fecha De Compra</td>
                           <td>Proveedor</td>
                           <td>Valor De Compra</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        //Otra forma

                        //SELECT c.e_idcompra,c.e_fecha,c.e_idproveedor,(SELECT SUM(dp.e_preciocompra) FROM t_detalleproducto as dp WHERE dp.e_idcompra = c.e_idcompra) as total FROM t_compra as c

                          $result_ventas = $db->query("SELECT c.e_idcompra,c.e_fecha,p.c_nombre,c.e_total FROM t_compra as c INNER JOIN t_proveedor as p ON c.e_idproveedor = p.e_idproveedor");

                          while($row = mysqli_fetch_array($result_ventas)) {
                            ?>
                            <tr>
                              <td><?php echo $row[0]; ?></td>
                              <td><?php echo date("d-m-Y", strtotime($row[1])); ?></td>
                              <td><?php echo $row[2]; ?></td>
                              <td>$<?php echo $row[3]; ?></td>
                                
                              <td width="200px">
                                <button  type="button" class="form-control btn-success roundtext" data-target="#modalDetalles" data-toggle="modal" onclick="cargarDetalles(<?php echo $row[0]; ?>);"><i class="fa fa-info-circle" aria-hidden="true"></i> Detalles</button>
                              </td>
                            </tr>
                            <?php
                          }
                        ?>
                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
              <!--fin de tabla-->


                  <!--modal para registrar compra-->
                   <div class="modal fade" style="overflow-y: scroll;" id="modalNuevo" role="dialog">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true" style="font-size: 35px;">×</span>
                                        <span class="sr-only">Cerrar</span>
                                    </button>
                                  <h3  style="padding-left:40%;" id="myModalLabel">Nueva Compra</h3>
                                      
                                   
                                     
                                    
                                   
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                  <div id="">
                                               
                                    <form name="registroCompra" action="asset/php/compras/registrar.php" method="POST">
                                     
                                      <div class="panel" style="padding-left: 87px;">
                                        <div class="row">
                                          <div class="col-md-6">
                                            <label>Fecha de Compra</label><br>
                                                        <input type="date" class="form-control roundtext2" placeholder="Fecha de Vencimiento" style="width: 225px;display: inline;height: 35px" value="<?php echo date("Y-m-d"); ?>" readonly>
                                          </div>
                                          <br>

                                          <div class="col-md-6">
                                          <!--ID del proveedor-->
                                            <input type="hidden" id="proveedor_POST" name="proveedor_POST" value="">
                                            <input type="hidden" id="total_POST" name="total_POST" value="">

                                            <input type="text" class="form-control roundtext2" placeholder="Proveedor" style="width: 225px;display: inline;" list="listaProveedores" id="proveedor_nombre">
                                            <datalist id="listaProveedores">
                                            <?php
                                              $result = $db->query("SELECT * FROM t_proveedor ORDER BY c_nombre ASC LIMIT 10");

                                              while($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <option data-id="<?php echo $row[0]?>" value="<?php echo $row[1]; ?>">
                                                <?php
                                              }

                                              
                                            ?>
                                            </datalist>
                                          </div>
                                        </div>
                                       
                                                        </div>
                                                <div class="row" style="padding-left:10%;" >
                                              <div class="col-md-6">
                                               
                                                        <input type="text" class="form-control roundtext2" placeholder="Codigo del Producto" style=" width: 225px;display: inline;" id="codigoProducto" autocomplete="off">

                                                        <!--Validar si el codigo existe-->
                                                        <button type="button" id="verificar_producto" class="btn ripple-infinite btn-round btn-info" title="Verificar existencia" tag="-1" product-name=""><i class="fa fa-info"></i></button>
                                                     
                                                       
                                                        <input type="text" class="form-control roundtext2" placeholder="Tipo de Paquete" style="width: 225px;display: inline;" id="paquete_registro">
                                                        <input type="number" class="form-control roundtext2" placeholder="Unidades por Paquete" style="width: 225px;display: inline;" id="unidades_registro">
                                                        <input type="number" class="form-control roundtext2" placeholder="Cantidad" style="width: 225px;display: inline;" id="cantidades_registro">

                                                        
                                              </div>
                                              <div class="col-md-6">
                                                <label>Fecha de Vencimiento</label><br>
                                                <input type="date" class="form-control roundtext2" placeholder="Fecha de Vencimiento" style="width: 225px;display: inline;height: 35px" min="<?php echo date("Y-m-d"); ?>" id="vencimiento_registro">
                                                
                                                        <input type="number" class="form-control roundtext2" placeholder="Precio de Compra" style="width: 225px;display: inline;" id="precio_compra_registro">
                                                       
                                                       
                                                         <div >
                                                      
                                                    
                                                      <input style="float: left;width: 228px;" type="button" value="Agregar" id="agregar_producto" class="btn ripple-infinite btn-round btn-success"  >
                                                      
                                                     </div>  
                                                      
                                                     
                                                       
                                              </div>
                                            </div> 

                                          <div class="row">

                                              <!--inicio de tabla -->
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                           <td>N°</td>
                           <td>Nombre</td>
                           <td>Tipo de paquete</td>
                           <td>Unidades por Paquete</td>
                           <td>Fecha de Vencimiento</td>
                           <td>Cantidad</td>
                           <td>Precio</td>
                           <td>Eliminar</td>
                        </tr>
                      </thead>
                      <tbody id="actualizarProductos">
                      </tbody>
                      </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
              <!--fin de tabla-->
              <label style="float: left;font-size: 32px;padding-left: 20px;top: 10px;" id="total_grande_compra">Total: $0.00</label>
              <input style="float: right;width: 130px;right: 20px;top: 10px;" type="button" value="Guardar" id="guardar_venta" class="btn ripple-infinite btn-round btn-success"  >
               <input style="float:right;width: 130px;right: 23px;top: 10px;" type="button"  value="Cancelar"  class="btn ripple-infinite btn-round btn-danger"   data-dismiss="modal">
                                                      
                                             
                                            </div>  
                                            
                                              
                                              
                                                                       
                                                              
                                                    <br>
                                                    
                                                    </form>    
                                                     
                                                       

                                              </div> 
                                                                <!-- fin de espacio en blanco -->






                                         </form>

                                      </div>
                                                            
                                    </div>
                                                          
                                   </div>


                                  </div>
                                </div>

                                <div class="modal-footer">
                                 
                                </div>
                               
                            </div>
                        </div>
                    </div> 

              <!--fin modal para registrar compra-->

              <!--Para mostrar detalles-->
              <div class="modal fade" id="modalDetalles" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" style="color: #918C8C;">Detalle de compra</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <table class="table table-striped table-bordered" width="100%" cellspacing="0" style="color: #918C8C;">
                        <thead>
                          <tr>
                            <td>Producto</td>
                            <td>Cantidad</td>
                            <td>Precio unitario</td>
                            <td>Sub-total</td>
                          </tr>
                        </thead>
                        <tbody id="actualizarDetalleCompra">
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>




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
      //funciones nornmales
      cargarDetalles = function(id_compra) {
        $.ajax({
          type: "POST",
          url: "asset/php/compras/ajaxObtenerDetalle.php",
          data: {
            compra: id_compra
          },
          success: function (response) {
            $("#actualizarDetalleCompra").html("");

            if(response != -1) {
              var datos = JSON.parse(response);
              datos.forEach(x => {
                $("#actualizarDetalleCompra").append(`
                <tr>
                  <td>${x.producto}</td>
                  <td>${x.cantidad}</td>
                  <td>$${x.precio}</td>
                  <td>$${x.subtotal}</td>
                </tr>
                `);
              });
            }
            else {
              $("#actualizarDetalleCompra").append(`
              <tr>
                <td></td>
                <td>Tuvimos problemas cargando los datos</td>
                <td></td>
              </tr>`);
            }
          }
        });
      };

      actualizarTotal = function() {
        let cantidades = document.getElementsByName("cantidad_POST[]");
        let precios = document.getElementsByName("precio_POST[]");

        var total = 0;
        
        for(i = 0 ; i < precios.length ; i++) {
          total += parseFloat(cantidades[i].value)*parseFloat(precios[i].value);
        }

        total = Math.round(total*100)/100;

        $("#total_grande_compra").text("Total: $"+total);
        $("#total_POST").val(total);
      };

      reiniciarModal = function() {
        $("#verificar_producto").attr("tag","-1");
        $("#verificar_producto").attr("product-name","");
        $("#codigoProducto").val("");

        $("#paquete_registro").val("");
        $("#unidades_registro").val("");
        $("#cantidades_registro").val("");
        $("#vencimiento_registro").val("");
        $("#precio_compra_registro").val("");

        $("#codigoProducto").css("border-radius", "5px");
        $("#codigoProducto").css("border-color", "#FF6656");
      };
      
      $(document).ready(function () {
        //obtener el id del proveedor
        $("#proveedor_nombre").on("input", function () { 
          let valor = $("#proveedor_nombre").val();
          let valor_list = $('#listaProveedores').find('option[value="'+valor+'"]').data('id');

          if(valor_list != undefined && valor_list != null) {
            $("#proveedor_POST").attr("value", valor_list);
          }
          else {
            $("#proveedor_POST").attr("value", "");
          }
        });

        //Para verificar si existe el producto
        $("#verificar_producto").click(function (e) { 
          e.preventDefault();
          
          if($("#codigoProducto").val() != "") {
            $.ajax({
              type: "POST",
              url: "asset/php/compras/ajaxExisteProducto.php",
              data: {
                codigo: $("#codigoProducto").val()
              },
              success: function (response) {
                if(response == -1) {
                  $("#codigoProducto").css("border-radius", "5px");
                  $("#codigoProducto").css("border-color", "#FF6656");

                  $("#verificar_producto").attr("tag", "-1");
                  $("#verificar_producto").attr("product-name", "");

                  alert("El codigo no existe");
                }
                else {
                  let valores = response.split(",");

                  $("#codigoProducto").css("border-radius", "5px");
                  $("#codigoProducto").css("border-color", "#27C24C");

                  $("#verificar_producto").attr("tag", valores[0]);
                  $("#verificar_producto").attr("product-name", valores[1]);
                }
              }
            });
          }
          else {
            $("#codigoProducto").css("border-radius", "0px");
            $("#codigoProducto").css("border-color", "#FF6656");

            $("#verificar_producto").attr("tag", "-1");
            $("#verificar_producto").attr("product-name", "");
          }
        });

        //validar un producto que se agrega a la lista
        $("#agregar_producto").click(function (e) { 
          e.preventDefault();
          
          if($("#verificar_producto").attr("tag") != "-1" && $("#verificar_producto").attr("product-name") != ""
            && $("#paquete_registro").val() != "" && $("#unidades_registro").val() != "" && $("#cantidades_registro").val() != ""
            && $("#vencimiento_registro").val() != "" && $("#precio_compra_registro").val() != "") {

              let numero_filas = document.getElementsByName("producto_POST[]").length + 1; //cantidad de registros
              
              //Se agrega el producto a la fila
              $("#actualizarProductos").append(`
                      <tr>
                          <td>
                            <label>${numero_filas}</label>
                          </td>
                          <td>
                            <input type="hidden" class="form-control" name="producto_POST[]" value="${$("#verificar_producto").attr("tag")}" />
                            <label>${$("#verificar_producto").attr("product-name")}<label/>
                          </td>
                          <td>
                            <input type="text" class="form-control" name="paquete_POST[]" value="${$("#paquete_registro").val()}"/>
                          </td>
                          <td>
                            <input type="number" class="form-control" name="unidades_paquete_POST[]" value="${$("#unidades_registro").val()}"/>
                          </td>
                          <td>
                            <input type="date" class="form-control" name="fecha_POST[]" value="${$("#vencimiento_registro").val()}" min="<?php echo date("Y-m-d"); ?>"/>
                          </td>
                          <td>
                            <input type="number" class="form-control recalcular-total" name="cantidad_POST[]" value="${$("#cantidades_registro").val()}"/>
                          </td>
                          <td>
                            <input type="number" class="form-control recalcular-total" name="precio_POST[]" value="${$("#precio_compra_registro").val()}"/>
                          </td>
                          <td>
                            <button type="button" class="form-control btn-warning roundbotton2 eliminar-producto"><i class="fa fa-close" aria-hidden="true"></i></button>
                          </td>
                        </tr>`);

              reiniciarModal();
              actualizarTotal();
          }
          else {
            if($("#verificar_producto").attr("tag") == "-1") {
              alert("Debe ingresar un producto valido");
            }
            else {
              alert("Todos los campos son obligatorios");
            }
          }
        });

        $(document).on("click", ".eliminar-producto", function () {
          let elemento = $(this)[0];

          if(confirm("¿Desea borrar esta fila?")) {
            $(elemento.parentElement.parentElement).remove();
            actualizarTotal();
          }
        });

        $("#guardar_venta").click(function (e) { 
          e.preventDefault();
          
          let productos = document.getElementsByName("producto_POST[]");
          
          if(productos.length > 0 && $("#proveedor_POST").val() != "") {
            if(confirm("¿Esta seguro que desea finalizar la compra?")) {
              document.registroCompra.submit();
            }
          }
          else {
            if(productos.length == 0) {
              alert("Debe ingresar productos primero");
            }
            if($("#proveedor_POST").val() == "") {
              alert("Ingrese el nombre del proveedor primero");
            }
          }
        });
      });
     </script>
  <!-- end: Javascript -->
  </body>
</html>