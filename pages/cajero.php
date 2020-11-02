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

      
     <!--inicio decontent-->
      <div id="content">
              

           
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel1">
                    <div class="panel-heading"><h3 align="center">Venta</h3>
                     <div class="row">
                     <div class="col-md-6" align="left" style="padding-right: 25px">
                           <label >Empleado</label>
                          <input style=" width: 40%;height: 35px;border-radius: 11px !important;" disabled="true" type="Text" class="roundtext2" value="Juan Mendoza"/>
                      
                        </div>
                        <div class="col-md-6" align="right" style="padding-right: 35px">
                           <label >Fecha</label>
                          <input style=" width: 30%;height: 35px;border-radius: 11px !important;" disabled="true" type="date" class="roundtext2" value="2020-08-18"/>
                      
                        </div>
                        </div>
                     </div>
                    <div class="panel-body">
                      <div class="row" style="padding-left: 2%; width: 100%">
                      <div  class="col-md-12" style="border: 1px solid #ccc;">
                         <div class="form-group">
                        <label style="margin-top: 15px;">Código</label>
                        <input style="width: 35%; margin-left: 10px;display: inline;"  type="text" class="form-control roundtext2" name="">
                            
                        <button style="margin-left: 10px;width: 80px;display: inline" type="button" class="form-control btn-success roundbotton">
                               <span class="fa fa-plus"></span> 
                              </button>
                        <label style="margin-top: 15px; margin-left: 50px;" >Cliente</label> 
                        <input style="width: 30%;display: inline" type="text" class="form-control roundtext2" name=""/ >
                        <button style="margin-left: 10px;width: 80px;display: inline" type="button" class="form-control btn-success roundbotton"><i class="fa fa-plus" aria-hidden="true"></i></button>
                      </div>  
                      <div class="form-group">
                        
                   

                        
                      </div>
                      </div>
                      </div>
                      <div class="row" style="padding-left: 2%; width: 100%" >
                      <div class="col-md-8" style="border: 1px solid #ccc;height: 250px;">

                      <table id="#" class="table table-striped" width="100%" cellspacing="0">
                      <thead>
                        <!-- star: Enc -->
                        <tr>
                          <th>Código</th>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Precio</th>
                        </tr>
                        <!-- end: Enc -->
                      </thead>
                      <tbody>
                        <tr>
                          <td>00001</td>
                          <td>Café</td>
                          <td>1</td>
                          <td>2,50</td>
                        </tr>  
                        <tr>
                          <td>00002</td>
                          <td>Azucar</td>
                          <td>1</td>
                          <td>1,50</td>
                        </tr> 
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr> 
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr> 
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr> 
                      </tbody>
                        </table>
                        
                      </div>
                      <div class="col-md-4" style="border: 1px solid #ccc;height: 250px">
                         <div style="background: #ccc;position: relative;left: -15px;top: -20px;height: 50px;width: 348px" >
                           <h2 style="color: black;text-align:right;padding-right: 10px;padding-top: 5px;font-size: 40px">0,00</h2>
                         </div> 

                         
                         <div >
                        <label style="align-content: left">Sub Total</label>
                        <input style="float: right; height: 30px;width: 150px;display: inline;text-align: right;" disabled="true" class="form-control " type="text"  name="" value="3,00"><br><br>

                        <label style="align-content: left"> % Descuento</label> 
                        <input style="float: right;height: 30px;width: 150px;display: inline;text-align: right;" class="form-control " type="text" name="" value="0"><br><br>

                        <label style="align-content: left">Total</label> 
                        <input style="float: right;height: 30px;width: 150px;display: inline;text-align: right;" disabled="true" class="form-control " type="text" name="" value="3,00"><br><br>
                       
                        <button style="width: 128px;display: inline;float: left;" class="form-control btn-danger roundbotton2"><i class="fa fa-times" aria-hidden="true" ></i>&nbsp;ESC Cancelar</button>
                         <button style="width: 125px;display: inline;float: right;" class="form-control btn-success roundbotton2"><i class="fa fa-floppy-o" aria-hidden="true"  ></i>&nbsp;F8 Guadar</button>
                         </div><br><br>

                    
                  </div>
                  <div class="row" style="padding-left: 2%; width: 100%" >
                    <div class="col-md-12">
                      
                    </div>
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
  <!-- end: Javascript -->
  </body>
</html>