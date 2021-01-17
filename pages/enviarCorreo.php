<!DOCTYPE html>
<html lang="en">
<head>
  <title>M Y B</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Carter+One&family=Paytone+One&family=Righteous&display=swap" rel="stylesheet">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->

<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('images/p2.jpeg');">
      <div class="wrap-email">

        <form class="login100-form">
         
          
          <span class="login100-form-title1 p-b-1 p-t-1">
            Ingresar correo
          </span>
         
          <br>
          <div class="wrap-input100 ">
            <input class="input100"  type="text" name="#" id="formCorreoEnviar" style="width: 100%; padding: 0 5px 0 0;">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

         
          <div class="container-login100-form-btn">
            <button class="login100-form-btn" id="enviar-mail">
              Enviar 
            </button>
          </div>

          <div class="text-center p-t-20">
            <a class="txt1" href="#">
              ¿iniciar sesion?
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

  <script>
    $(document).ready(function () {
      $("#enviar-mail").click(function (e) { 
        e.preventDefault();

        if($("#formCorreoEnviar").val() != "") {
          $.ajax({
            type: "POST",
            url: "asset/php/usuario/ajaxEnviarCorreo.php",
            data: {
              correo: $("#formCorreoEnviar").val()
            },
            success: function (response) {
              if(response != -1 && response != -2) {
                alert("Correo enviado");
                $(location).attr("href", "index.php");
              }
              else {
                if(response == -2) {
                  alert("El correo no existe");
                }
                else {
                  alert("Tuvimos un problema para enviar el correo");
                }
              }
            }
          });
        }
      });
    });
  </script>

</body>
</html>