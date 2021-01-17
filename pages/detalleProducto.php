<?php include "asset/php/sesion/validar_sesion.php"; ?>

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
             <button  style="width: 150px;" type="button" onclick="verArbol();" class="form-control btn-success roundbotton" data-target="#modalNuevo" data-toggle="modal" >
            <i class="fa fa-user-plus" aria-hidden="true" ></i>
             Agregar Unidades</button>
           </div> 
            <div style="top:20px !important;float:right;padding-left:20px;position: relative;">
             <button  type="button" style="width: 120px;" class="form-control btn-info roundbotton"  type="button"    data-toggle="modal">
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
                    <div class="panel-heading"><h3>Unidades en Existecia</h3>
                      <br>
                      <div class="row">
                      <div class="col-md-9"><h4>Nombre: "Nombre Producto Aqui"</h4></div>
                      <div  class="col-md-3"><h4>Valor Promedio : "Valor aqui"</h4></div>
                      </div>

                    </div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                           <td>N°</td>
                               <td>Codigo</td>
                               <td>Nombre</td>
                               <td>Categoria</td>
                               <td>Marca</td>
                               <td>% Ganancia</td>
                               <td>Precio Venta</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td width="200px"><button  type="button" class="form-control btn-success roundtext" data-target="#modalModificar" data-toggle="modal" >
                                  <i class="fa fa-info-circle" aria-hidden="true"></i>
          Detalles</button></td>
                        </tr>
                        
                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
              <!--fin de tabla-->


                  <!--modal para registrar clientes-->
                   <div class="modal fade" style="overflow-y: scroll;" id="modalNuevo" role="dialog">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true" style="font-size: 35px;">×</span>
                                        <span class="sr-only">Cerrar</span>
                                    </button>
                                  <h3  style="padding-left:150px" id="myModalLabel">Ingreso De Nuevas Unidades</h3>
                                      
                                   
                                     
                                    
                                   
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                  <div id="contenido">  

                                               
                                    <form id="registroCliente">
                                                               
                                        
                                            <div class="row">
                                              <div class="col-md-6">
                                               
                                                      
                                                     <label>Fecha de Vencimiento</label><br>
                                                        <input type="date" class="form-control roundtext2" placeholder="Fecha de Vencimiento" style="width: 225px;display: inline;height: 35px">
                                                        <input type="text" class="form-control roundtext2" placeholder="Proveedor" style="width: 225px;display: inline;">
                                                        <button style="width: 40px;display: inline" class="btn ripple-infinite btn-round btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                        <input type="text" class="form-control roundtext2" placeholder="Tipo de Paquete" style="width: 225px;display: inline;">
                                                         <input type="text" class="form-control roundtext2" placeholder="Unidadespor Paquete" style="width: 225px;display: inline;">

                                                        
                                              </div>
                                              <div class="col-md-6">
                                                <label>Fecha de Compra</label><br>
                                                <input type="date" class="form-control roundtext2" placeholder="Fecha de Vencimiento" style="width: 225px;display: inline;height: 35px">
                                                 <input type="text" class="form-control roundtext2" placeholder="Cantidad" style="width: 225px;display: inline;">
                                                        <input type="text" class="form-control roundtext2" placeholder="precio de Compra" style="width: 225px;display: inline;">
                                                       
                                                       
                                                         <div >
                                                      
                                                    
                                                      <input style="float: left;width: 120px;" type="button" value="Guardar" id="guardar"  name="guardar" class="btn ripple-infinite btn-round btn-success"  >
                                                       <input style="float:left;width: 120px;" type="button"  value="Cancelar"  class="btn ripple-infinite btn-round btn-danger"   data-dismiss="modal">
                                                     </div>  
                                                      
                                                     
                                                       
                                              </div>
                                            </div>  
                                            
                                              
                                              
                                                                       
                                                              
                                                    <br><br>
                                                    
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

              <!--fin modal para registrar productos-->

               <!--modal para Modificar clientes-->
                   <div class="modal fade" style="overflow-y: scroll;" id="modalModificar" role="dialog">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true" style="font-size: 35px;">×</span>
                                        <span class="sr-only">Cerrar</span>
                                    </button>
                                  <h3  style="padding-left:150px;color:#918c8c;" id="myModalLabel">Ingreso De Nuevas Unidades</h3>
                                      
                                   
                                     
                                    
                                   
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                  <div id="contenido">  

                                               
                                    <form id="registroCliente">
                                                               
                                        
                                            <div class="row">
                                              <div class="col-md-6">
                                               
                                                      
                                                     <label style="color:#918c8c;">Fecha de Vencimiento</label><br>
                                                        <input type="date" class="form-control roundtext2" placeholder="Fecha de Vencimiento" style="width: 225px;display: inline;height: 35px">
                                                        <input type="text" class="form-control roundtext2" placeholder="Proveedor" style="width: 225px;display: inline;">
                                                        <button style="width: 40px;display: inline" class="btn ripple-infinite btn-round btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                        <input type="text" class="form-control roundtext2" placeholder="Tipo de Paquete" style="width: 225px;display: inline;">
                                                         <input type="text" class="form-control roundtext2" placeholder="Unidadespor Paquete" style="width: 225px;display: inline;">

                                                        
                                              </div>
                                              <div class="col-md-6">
                                                <label style="color:#918c8c;">Fecha de Compra</label><br>
                                                <input type="date" class="form-control roundtext2" placeholder="Fecha de Vencimiento" style="width: 225px;display: inline;height: 35px">
                                                 <input type="text" class="form-control roundtext2" placeholder="Cantidad" style="width: 225px;display: inline;">
                                                        <input type="text" class="form-control roundtext2" placeholder="precio de Compra" style="width: 225px;display: inline;">
                                                       
                                                       
                                                         <div >
                                                      
                                                    
                                                     <div style="padding-right: 41px;">
                                                       <input style="float:right;width: 235px;" type="button"  value="Cancelar"  class="btn ripple-infinite btn-round btn-danger"   data-dismiss="modal">
                                                       </div>
                                                     </div>  
                                                      
                                                     
                                                       
                                              </div>
                                            </div>  
                                            
                                              
                                              
                                                                       
                                                              
                                                    <br><br>
                                                    
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

              <!--fin modal para Modificar productos-->





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
  <!-- end: Javascript -->
  </body>
</html>