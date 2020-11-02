
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Compras</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/archivo.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    

   
    
    



    <link href="sweetalert/sweetalert2.css" rel="stylesheet" />

   
    <link rel="stylesheet" type="text/css" href="css/animate.min.css"/>

    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">


  
    
    
</head>
<body   class="fix-header card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        
                <!-- header aqui-->


        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

                <!-- menu aqui-->

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-titles">
                    <div class="col-md-11 col-10 ">
              
                        <ol class="breadcrumb">
                            
                            <div class="container">
           
            
           <div style="top:7px !important;float:right;padding-left: 2px;position: relative;">
             <button  style="width: 170px;" type="button" onclick="verArbol();" class="btn btn-success btn-md" >
            <i class="fa fa-user-plus" aria-hidden="true"></i>
             Nueva Compra</button>
           </div> 
            <div style="top:7px !important;float:right;padding-left: 1.5%;position: relative;">
             <button  type="button" style="width: 135px;" class="btn btn-info btn-md"  type="button"    data-toggle="modal">
            <i class="fa fa-user-plus" aria-hidden="true"></i>
             Reporte</button>
           </div>
             <div style="top:5px;float:right;padding-left:0px !important;" class="col-md-6">


           <input type="text" class="form-control input-md roundtext"  onkeyup="busquedaCuentas();" id="busq" placeholder="&nbsp; &nbsp; &#xf002; Buscar"> <a class="srh-btn">    
           </div>

            

           
          
            <div style="width:150px">   
                           
              
            </div>
           
        </div> <br> 

                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
               

                  <div id="content">

                   <div class="col-md-11 top-20">
                    <div class="card">
          

                             <div style="top:5px;float:left;padding-left:40% !important;" class="page-titles">
                    
              
                        <ol  class="breadcrumb">
                           
                            <li style="font-size: 30px;" class="breadcrumb-item active ">Listado de Compras
                             
                             </li>

                        </ol>

                   
                    
                </div>
                <br><div class="linea">  </div>

        <div class="panel-body" id="tablapartidas">
                
                <div class="responsive-table">                      
            <table class="table"  id="tablaDatos">
        <tr>
          <td>N°</td>
          <td>Fecha De Compra</td>
          <td>Proveedor</td>
          <td>Valor De Compral</td>
        </tr>
       
       <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          
          <td><button type="button" class="btn ripple-infinite btn-round btn-success" >
          <i class="fa fa-info-circle" aria-hidden="true"></i>
        Detalles</button></td>

        </tr>
   
       </table>
       


              <nav aria-label="paginacion">
                <ul class="pagination pagination-sm">
               

                 
          <li style="padding-left: 10px;"  class="page-item 
                  <?php echo ($pagina<=1)? 'disabled' : '' ?>" >
                    <a href="#"  class="page-link" aria-label="Ant">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                    
                  </li>
                  
                
                  
                    <li class="page-item"><a href="#" class="page-link">...</a></li>

                 
                
           
                
               
                 <li class="page-item <?php echo $pagina>=$totalPaginas ? 'disabled' : ''; ?>">
                    <a href="#"  class="page-link" aria-label="Sig">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                    
                  </li>
                 </ul>
               </nav>
           </div>

        </div>
      </div>
  </div>







      </div>
                
                   
  
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                footer
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>


        <!-- SweetAlert Plugin Js -->
       
        <script src="sweetalert/sweetalert2.js"></script>

        <script src="js/funciones.js"></script>

    <!-- aqui se encuentran todas las funciones js que hacen posible el funcionamiento de esta pagina-->
    <script src="js/funcionesLibroDiario.js"></script>
                    
</body>
</html>
