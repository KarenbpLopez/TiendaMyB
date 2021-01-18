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

    <script type="text/javascript">
        function abrirVentana() {
              var window_width = 750;
              var window_height = 480;
              var newfeatures= 'scrollbars=no,resizable=no';
              var window_top = (screen.height-window_height)/2;
              var window_left = (screen.width-window_width)/2;
              newWindow=window.open('reportes/reporteUsuario.php', 'Reporte','width=' + window_width + ',height=' + window_height + ',top=' + window_top + ',left=' + window_left + ',features=' + newfeatures + '');
}
        function configuraLoading(screen){
  $(document).ajaxStart(function(){
    screen.fadeIn();
  }).ajaxStop(function(){
    screen.fadeOut();
  });
}

    </script>

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
             <button  style="width: 150px;" type="button" class="form-control btn-success roundbotton" data-target="#modalNuevo" data-toggle="modal" onclick="resetearModal();">
            <i class="fa fa-user-plus" aria-hidden="true" ></i>
             Nuevo Usuario</button>
           </div> 
            <div style="top:20px !important;float:right;padding-left:20px;position: relative;">
             <button  type="button" onclick="abrirVentana();" style="width: 120px;" class="form-control btn-info roundbotton"  type="button"    data-toggle="modal">
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
                    <div class="panel-heading"><h3>Lista de Usuarios</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <td>N°</td>
                          <td>Nombre Usuario</td>
                          <td>Empleado</td>
                          <td>Correo Electronico</td>
                        </tr>
                      </thead>
                      <tbody id="actualizarTabla">
                        <?php
                          include "conexion_db.php";
                          $result = $db->query("SELECT u.e_idusuario,u.c_nombreusuario,CONCAT(e.c_nombre, ' ', e.c_apellido) as nombre,u.c_correo FROM t_usuario as u INNER JOIN t_empleado as e ON u.e_idempleado = e.e_idempleado");
                          while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                              <td><?php echo $row[0]; ?></td>
                              <td><?php echo $row[1]; ?></td>
                              <td><?php echo $row[2]; ?></td>
                              <td><?php echo $row[3]; ?></td>
                              <td width="130px">
                                <button  type="button" class="form-control btn-success roundtext obtener-datos" data-target="#modalNuevo" data-toggle="modal" tag="<?php echo $row[0]; ?>"><i class="fa fa-pencil" aria-hidden="true"></i> Modificar</button>
                                </td>
                              <td width="130px">
                                <button  type="button" class="form-control btn-danger roundtext eliminar-datos" tag="<?php echo $row[0]; ?>" name-emp="<?php echo $row[2]; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
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
                                  <h3  style="padding-left:150px" id="myModalLabel">Registro de Usuario</h3>
                                      
                                   
                                     
                                    
                                   
                                </div>
                                <!-- Modal Body -->
                                <div class="modal-body">
                                  <input type="hidden" id="formHiddenIDUsuario">

                                  <div id="contenido">  

                                               
                                    <form id="registroUsuario">
                                                               

                                            <div class="row">
                                              <div class="col-md-12">
                                                <input type="hidden" id="formIDEmp">

                                                <input type="text" class="form-control roundtext2" placeholder="Empleado" id="formBuscarEmp" list="listaEmpleados">
                                                <datalist id="listaEmpleados">
                                                  <?php
                                                    $result = $db->query("SELECT e_idempleado,CONCAT(c_nombre, ' ', c_apellido) as nombre FROM t_empleado");
                                                    while($row = mysqli_fetch_array($result)) {
                                                      ?>
                                                        <option data-value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
                                                      <?php
                                                    }
                                                    $db->close();
                                                  ?>
                                                </datalist>
                                              </div>
                                            </div>
                                             <input type="text" class="form-control roundtext2" placeholder="Nombre de Usuario" id="formNombreUsuario">
                                              <input type="text" class="form-control roundtext2" placeholder="Correo Electrónico" id="formCorreoUsuario">
                                              <div class="row">
                                              <div class="col-md-6">
                                               
                                                 <input type="password" class="form-control roundtext2" placeholder="Contraseña" id="formContraUsuario">
                                              </div>
                                              <div class="col-md-6">
                                                
                                                     
                                                       <input type="password" class="form-control roundtext2" placeholder="Confirmar Contraseña" id="formReContraUsuario">
                                                     
                                                       
                                              </div>
                                            </div>
                                            <br>
                                                                       
                                                                
                                                    
                                                     <div style="float: right;">
                                                       <input  type="button" value="Guardar" id="guardar"  name="guardar" class="btn ripple-infinite btn-round btn-success"  >
                                                     <input  type="button"  value="Cerrar"  class="btn ripple-infinite btn-round btn-danger"   data-dismiss="modal">
                                                     </div>
                                                      <br>
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

              <!--fin modal para registrar clientes-->







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


    <!-- custom -->
     <script src="asset/js/main.js"></script>

     <script src="asset/js/usuarios/app-user.js"></script>

     <?php include "asset/php/sesion/script_logout.php"; ?>
  <!-- end: Javascript -->
  </body>
</html>