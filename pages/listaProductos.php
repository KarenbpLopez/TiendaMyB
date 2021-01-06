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
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/fullcalendar.min.css" />
  <link href="asset/css/style.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="sweetalert/sweetalert2.min.css" />
  <!-- end: Css -->
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <link rel="stylesheet" type="text/css" href="css/animate.min.css" />

  <link rel="stylesheet" type="text/css" href="css/font-awesome.css">

  <?php include "header.php"; ?>
  
</head>

<body id="mimin" class="dashboard">
  <!-- start: Header -->
  
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
            <button style="width: 150px;" type="button" onclick="resetearModalP();" class="form-control btn-success roundbotton" data-target="#modalNuevo" data-toggle="modal">
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              Nuevo Producto</button>
          </div>
          <div style="top:20px !important;float:right;padding-left:20px;position: relative;">
            <button type="button" style="width: 120px;" class="form-control btn-info roundbotton" type="button" data-toggle="modal">
              <i class="fa fa-file-text-o" aria-hidden="true"></i>
              Reporte</button>
          </div>


          <div style="top:20px;float:right;padding-left:0px !important;" class="col-md-6">


            <input type="text" class="form-control input-md roundtext" id="busq" placeholder="&#xf002;&nbsp;Buscar"> <a class="srh-btn">
          </div>
          <div style="top:8px !important;float:right;padding-right: 60px;padding-left: 10px; position: relative;">
            <button style="width: 150px;" type="button" class="form-control btn-primary roundbotton" data-target="#modalC" data-toggle="modal">
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              Categorias</button>
          </div>
          <div style="top:8px !important;float:right;padding-right: 0px;position: relative;">
            <button style="width: 120px;" type="button" class="form-control btn-primary roundbotton" data-target="#modalM" data-toggle="modal">
              <i class="fa fa-user-plus" aria-hidden="true"></i>
              Marcas</button>
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
          <div class="panel-heading">
            <h3>Lista de Productos</h3>
          </div>
          <div class="panel-body">
            <div class="responsive-table">
              <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <td>N°</td>
                    <!-- <td>Codigo</td> -->
                    <td>Nombre</td>
                    <td>% Ganancia</td>
                    <td>Precio Venta</td>
                    <td>Marca</td>
                    <td>Categoria</td>
                  </tr>
                </thead>
                <tbody id="actualizarTabla">
                <?php
                  include "conexion_db.php";
                  $result = $db->query("SELECT p.e_idproducto, p.c_nombreproducto, p.e_porcentajeganancia, p.e_precioventa, m.c_nombremarca, c.c_nombrecategoria FROM t_producto as p INNER JOIN t_marca as m ON p.e_idmarca = m.e_idmarca INNER JOIN t_categoria as c ON p.e_idcategoria = c.e_idcategoria");
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <tr>
                      <td><?php echo $row[0]; ?></td>
                      <td><?php echo $row[1]; ?></td>
                      <td><?php echo $row[2]; ?></td>
                      <td><?php echo $row[3]; ?></td>
                      <td><?php echo $row[4]; ?></td>
                      <td><?php echo $row[5]; ?></td>

                    <td width="130px"><button type="button" class="form-control btn-success roundtext obtener-datos" data-target="#modalNuevo" data-toggle="modal" tag="<?php echo $row[0];?>">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                        Modificar</button></td>
                    <td width="120px"><button type="button" class="form-control btn-danger roundtext eliminar-datos" data-toggle="modal" tag="<?php echo $row[0]?>" nombre-producto="<?php echo $row[1]; ?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        Eliminar</button></td>
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

    <!--modal registrar productos-->
    <div class="modal fade" style="overflow-y: scroll;" id="modalNuevo" role="dialog">
      <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true" style="font-size: 35px;">×</span>
              <span class="sr-only">Cerrar</span>
            </button>
            <h3 style="padding-left:150px" id="myModalLabel">Registro de Producto</h3>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">
          <input type="hidden" id="formHiddenIDProducto">
            <div id="contenido">
              <form id="registroProducto">
                <input type="text" class="form-control roundtext2" id="formProducto" placeholder="Nombre" >
                <div class="row">
                  <div class="col-md-6">
                  <input type="hidden" id="formM">
                  <select id="marca"  class="form-control roundtext2" style="width: 221px;display: inline;color: #918c8c;" onclick="mod();">
                        <option value="">Marca</option>
                        <?php
                          $result = $db->query("SELECT * FROM t_marca");

                             while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                         <?php
                        }
                        // $db->close();
                        ?>
                      </select>
                  
                  </div>
                  <div class="col-md-6">
                  <input type="hidden" id="formCa">
                      <select id="categoria"  class="form-control roundtext2" style="width: 221px;display: inline;color: #918c8c;" onclick="mod();">
                        <option value="">Categoría</option>
                        <?php
                          $result = $db->query("SELECT * FROM t_categoria");

                             while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row[0]?>"><?php echo $row[1]?></option>
                         <?php
                        }
                        $db->close();
                        ?>
                      </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control roundtext2" placeholder="% Ganancia" id="formGanancia" style="width: 225px;display: inline;"
                    onkeypress="return validarNumeros(event);">
                    </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control roundtext2" placeholder="Precio de Venta" id="formPVenta" style="width: 221px;display: inline;"
                    onkeypress="return validarNumeros(event);">
                    </div>
                </div>
                <div style="float: right;">
                  <input type="button" value="Guardar" id="guardar" name="guardar" class="btn ripple-infinite btn-round btn-success">
                  <input type="button" value="Cerrar" class="btn ripple-infinite btn-round btn-danger" data-dismiss="modal">
                </div>
                <br>
                <br>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--fin modal registrar productos-->

    <!-- modal registro marca -->
    <div class="modal fade" style="overflow-y: scroll;" id="modalM" role="dialog">
      <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true" style="font-size: 35px;">×</span>
              <span class="sr-only">Cerrar</span>
            </button>
            <h3 style="padding-left:180px" id="myModalLabel">Registro de Marca</h3>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">
          <input type="hidden" id="formHiddenIDMarca">
            <div id="contenido">
              <form id="registroMarca">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" style="width: 260px;float: left;" class="form-control roundtext2" id="formNombreM" placeholder="Nombre" autocomplete="off">
                  </div>
                  <div class="col-md-6">
                    <div>
                      <input style="float:left;width: 120px;" type="button" value="Guardar" id="guardarM" name="guardarM" class="btn ripple-infinite btn-round btn-success" >
                      <input style="float: right;width: 120px;" type="button" value="Cerrar" class="btn ripple-infinite btn-round btn-danger" data-dismiss="modal">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fin modal registro marca -->
    

    <!-- modal registro categoria -->
    <div class="modal fade" style="overflow-y: scroll;" id="modalC" role="dialog">
      <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true" style="font-size: 35px;">×</span>
              <span class="sr-only">Cerrar</span>
            </button>
            <h3 style="padding-left:180px" id="myModalLabel">Registro de Categoría</h3>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">
            <div id="contenido">
              <form id="registroCategoria">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" style="width: 320px;float: left;" class="form-control roundtext2" id="formNombreC" autocomplete="off" placeholder="Nombre" onkeypress="return validarTextos(event);">
                  </div>
                  <div class="col-md-6">
                    <div style="float: right;padding-right:1px;">
                      <input style="width: 120px;" type="button" value="Guardar" id="guardarC" name="guardarC" class="btn ripple-infinite btn-round btn-success" >
                      <input style="width: 120px;" type="button" value="Cerrar" class="btn ripple-infinite btn-round btn-danger" data-dismiss="modal">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- fin modal registro categoria -->
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

  <script src="asset/js/productos/app-producto.js"></script>
  <script src="asset/js/M&C/app-marca.js"></script>
  <script src="asset/js/M&C/app-categoria.js"></script>
  <!-- end: Javascript -->
  </body>
  </html>