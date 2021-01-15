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

  <!-- <link rel="shortcut icon" href="asset/img/logomi.png"> -->
  <link rel="icon" type="image/png" href="images/icons/favicon3.ico"/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

 <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
             

              <ul class="nav navbar-nav search-nav">
                <li>
                   <!--<div class="search">
                    <span class="fa fa-search icon-search" style="font-size:23px;"></span>
                    <div class="form-group form-animate-text">
                      <input type="text" class="form-text" required>
                      <span class="bar"></span>
                      <label class="label-search">Type anywhere to <b>Search</b> </label>
                    </div>
                  </div> -->
                </li>
              </ul>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span>Administrador</span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                        <li><a href=""><span class="fa fa-cogs"></span> Configuración</a></li>
                        <li><a href="login.php"><span class="fa fa-power-off "></span> Salir</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class=""></div></li>
                    <!-- start:Date -->
                    <li>
                      <h1  class="animated fadeInLeft"><p class="f" id="clk" align="center"></p></h1>
                      <p class="animated fadeInRight"><p class="f1" id="dd" align="center"></p></p>
                    </li>
                    <!-- end:Date -->
                    <li class="ripple redo">
                      <a class="tree-toggle nav-header"><span class="fa-home fa"></span> Inicio 
                      </a>
                    </li>
                    <li class="ripple redo">
                      <a class="tree-toggle nav-header">
                        <span class="fa-navicon fa"></span> Listados
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="listaCliente.php"><span class="fa-check fa"></span>Cliente</a></li>
                        <li><a href="listaEmpleados.php"><span class="fa-check fa"></span>Empleado</a></li>
                        <li><a href="listaProveedor.php"><span class="fa-check fa"></span>Proveedor</a></li>
                        <li><a href="listaProductos.php"><span class="fa-check fa"></span>Producto</a></li>
                        <li><a href="listaCargos.php"><span class="fa-check fa"></span>Cargo</a></li>
                      </ul>
                    </li>
                    <li class="ripple redo">
                      <a class="tree-toggle nav-header" href="#">
                        <span class="fa-shopping-cart fa"></span> Venta
                      </a>
                    </li>
                    <li class="ripple redo"><a class="tree-toggle nav-header">
                    <span class="fa-shield fa"></span> Seguridad 
                    <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="#">Usuario</a></li>
                      </ul>
                    </li>
                    
                    <li class="ripple redo">
                      <a class="tree-toggle nav-header" href="#">
                        <span class="fa-info fa"></span> Ayuda
                      </a>
                    </li>

                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->
          <footer class="footer text-center">
                © 2017 Monster Admin by wrappixel.com
            </footer>

      </div>
     

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