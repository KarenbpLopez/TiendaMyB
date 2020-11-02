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
             Nuevo Producto</button>
           </div> 
            <div style="top:20px !important;float:right;padding-left:20px;position: relative;">
             <button  type="button" style="width: 120px;" class="form-control btn-info roundbotton"  type="button"    data-toggle="modal">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>
             Reporte</button>
           </div>
          
           
             <div style="top:20px;float:right;padding-left:0px !important;" class="col-md-6">


           <input type="text" class="form-control input-md roundtext"  id="busq" placeholder="&#xf002;&nbsp;Buscar"> <a class="srh-btn">    
           </div>
            <div style="top:8px !important;float:right;padding-right: 60px;padding-left: 10px; position: relative;">
             <button  style="width: 280px;" type="button" onclick="verArbol();" class="form-control btn-primary roundbotton" data-target="#modalNuevo" data-toggle="modal" >
            <i class="fa fa-user-plus" aria-hidden="true" ></i>
             Categorias & Marcas</button>
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
                    <div class="panel-heading"><h3>Lista De Productos</h3></div>
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
                               <td>Unidades Disponibles</td>
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

                              <td></td>
                             <td width="130px"><button  type="button" class="form-control btn-warning roundtext" data-target="#modalModificar" data-toggle="modal" >
                                  <i class="fa fa-info-circle" aria-hidden="true"></i>
          Modificar</button></td>
           <td width="120px"><button  type="button" class="form-control btn-success roundtext" data-target="#" data-toggle="modal" >
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


                
                <!--modal para registrar productos-->
                   <div class="modal fade" style="overflow-y: scroll;" id="modalNuevo" role="dialog">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true" style="font-size: 35px;">×</span>
                                        <span class="sr-only">Cerrar</span>
                                    </button>
                                  <h3  style="padding-left:150px" id="myModalLabel">Registro De Producto</h3>
                                      
                                   
                                     
                                    
                                   
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                  <div id="contenido">  

                                               
                                    <form id="registroCliente">
                                                               
                                         <input type="text" class="form-control roundtext2" placeholder="Nombre">
                                            <div class="row">
                                              <div class="col-md-6">
                                               
                                                      
                                                     
                                                        <input type="text" class="form-control roundtext2" placeholder="Marca" style="width: 225px;display: inline;">
                                                        <button style="width: 40px;display: inline" class="btn ripple-infinite btn-round btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                              </div>
                                              <div class="col-md-6">
                                                <input type="text" class="form-control roundtext2" placeholder="Categoria" style="width: 221px;display: inline;">
                                                <button style="width: 40px;display: inline" class="btn ripple-infinite btn-round btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                      
                                                     
                                                       
                                              </div>
                                            </div>  
                                            <div class="row">
                                              <div class="col-md-6">
                                                 <input type="text" style="width: 260px;float: left;" class="form-control roundtext2" placeholder="% de Ganancia">
                                              </div>
                                              <div class="col-md-6">
                                                 <div >
                                                      
                                                     <input style="float:left;width: 130px;" type="button"  value="Cancelar"  class="btn ripple-infinite btn-round btn-danger"   data-dismiss="modal">
                                                      <input style="float: right;width: 130px;" type="button" value="Guardar" id="guardar"  name="guardar" class="btn ripple-infinite btn-round btn-success"  >
                                                     </div>
                                              </div>
                                            </div>
                                              
                                              
                                                                       
                                                                
                                                    
                                                    
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


                <!--modal para registrar clientes-->
                   <div class="modal fade" style="overflow-y: scroll;" id="modalModificar" role="dialog">
                        <div class="modal-dialog modal-md modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true" style="font-size: 35px;">×</span>
                                        <span class="sr-only">Cerrar</span>
                                    </button>
                                  <h3  style="padding-left:150px;color:#918c8c;" id="myModalLabel">Registro De Producto</h3>
                                      
                                   
                                     
                                    
                                   
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                  <div id="contenido">  

                                               
                                    <form id="registroCliente">
                                                               
                                         <input type="text" class="form-control roundtext2" placeholder="Nombre">
                                            <div class="row">
                                              <div class="col-md-6">
                                               
                                                      
                                                     
                                                        <input type="text" class="form-control roundtext2" placeholder="Marca" style="width: 225px;display: inline;">
                                                        <button style="width: 40px;display: inline" class="btn ripple-infinite btn-round btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                              </div>
                                              <div class="col-md-6">
                                                <input type="text" class="form-control roundtext2" placeholder="Categoria" style="width: 221px;display: inline;">
                                                <button style="width: 40px;display: inline" class="btn ripple-infinite btn-round btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                                      
                                                     
                                                       
                                              </div>
                                            </div>  
                                            <div class="row">
                                              <div class="col-md-6">
                                                 <input type="text" style="width: 260px;float: left;" class="form-control roundtext2" placeholder="% de Ganancia">
                                              </div>
                                              <div class="col-md-6">
                                                 <div >
                                                      
                                                     <input style="float:left;width: 130px;" type="button"  value="Cancelar"  class="btn ripple-infinite btn-round btn-danger"   data-dismiss="modal">
                                                      <input style="float: right;width: 130px;" type="button" value="Modificar" id="guardar"  name="guardar" class="btn ripple-infinite btn-round btn-success"  >
                                                     </div>
                                              </div>
                                            </div>
                                              
                                              
                                                                       
                                                                
                                                    
                                                    
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
  <!-- end: Javascript -->
  </body>
</html>