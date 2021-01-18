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
  
  <link rel="stylesheet" type="text/css" href="sweetalert/sweetalert2.min.css" />

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

      <div id="content">
               

              
           
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
                    <div class="panel-heading"><h3>Servicio de Ayuda</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      
                <ul class="nav nav-list">
                    <li><div class=""></div></li>
                    <!-- start:Date -->
                    <li>
                      <h1  class="animated fadeInLeft"><p class="f" id="clk" align="center"></p></h1>
                      <p class="animated fadeInRight"><p class="f1" id="dd" align="center"></p></p>
                    </li>
                    <!-- end:Date -->
                    
                    <li class="ripple redo">
                      <a class="tree-toggle nav-header">
                        <span class="fa-navicon fa"></span> Módulos
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
       
            
            <div style="top:20px !important;float:right;padding-right: 10px;padding-right: 1400px; position: relative;">  
             <button  style="width: 150px;" type="button" class="form-control btn-success roundbotton" data-target="#modalNuevo" data-toggle="modal" onclick="resetearModal();">
            <i class="fa fa-user-plus" aria-hidden="true" ></i>
             Módulo de Listados</button> 
           </div>
          
    

        

       
           <div style="top:20px !important;float:right;padding-right: 10px;padding-right: 1400px; position: relative;">
             <button  style="width: 150px;" type="button" class="form-control btn-success roundbotton" data-target="#modalCompras" data-toggle="modal" onclick="resetearModal();">
            <i class="fa fa-user-plus" aria-hidden="true" ></i>
             Módulo de Compras</button>
           </div>

           <div style="top:20px !important;float:right;padding-right: 10px;padding-right: 1400px; position: relative;">
             <button  style="width: 150px; height: 50px" type="button" class="form-control btn-success roundbotton" data-target="#modalNCompras" data-toggle="modal" onclick="resetearModal();">
            <i class="fa fa-user-plus" aria-hidden="true" ></i>
             Nueva Compra</button>
           </div>
          

          
           <div style="top:10px !important;float:right;padding-right: 10px;padding-right: 1400px; position: relative;">
             <button  style="width: 150px  ; height: 50px" type="button" class="form-control btn-success roundbotton" data-target="#modalVentas" data-toggle="modal" onclick="resetearModal();">
            <i class="fa fa-user-plus" aria-hidden="true" ></i>
            Módulo de Ventas</button>
           </div>
         
                                
                      </ul>
                    </li>
                   
                  </ul>
                </div>
                      </div>
                  </div>
                </div>
              </div>  
              </div>
              <!--fin de tabla-->


               
               
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width: 95%">
    <div class="modal-content">
    <div class="modal-body"><img src="images/empleados.jpg" width="100%" class="img-fluid" alt="Responsive image" />   </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCompras" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width: 95%">
    <div class="modal-content">
    <div class="modal-body"><img src="images/compras.jpg" width="100%" class="img-fluid" alt="Responsive image" />   </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalNCompras" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width: 95%">
    <div class="modal-content">
    <div class="modal-body"><img src="images/nuevaCompra.jpg" width="100%" class="img-fluid" alt="Responsive image" />   </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalVentas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="width: 95%">
    <div class="modal-content">
    <div class="modal-body"><img src="images/ventas.jpg" width="100%" class="img-fluid" alt="Responsive image" />   </div>
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
    <script src="sweetalert/sweetalert2.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script src="asset/js/jquery_formato.js"></script>
    <!-- custom -->
     <script src="asset/js/main.js"></script>

     <!--Custom javascript-->
    <script src="asset/js/empleados/app-emp.js"></script>

    <?php include "asset/php/sesion/script_logout.php"; ?>
  <!-- end: Javascript -->
  </body>

  
</html>