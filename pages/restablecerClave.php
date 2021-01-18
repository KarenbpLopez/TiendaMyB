<?php
  if($_GET["u"] != "" && $_GET["cod"] != "") {
    include "conexion_db.php";
    
    $id = $_GET["u"];
    $cod = $_GET["cod"];
    $result = $db->query("SELECT * FROM t_usuario WHERE e_idusuario = $id AND c_passwordtmp = '$cod'");
    $valido = -1;

    while($row = mysqli_fetch_array($result)) {
      $valido = 0;
    }

    $db->close();

    if($valido == -1) {
      header("Location: login.php");
    }
  }
  else {
    header("Location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>M Y B</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <<link rel="icon" type="image/png" href="images/icons/favicon3.png"/>
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
      <div class="wrap-restablecer">

        <form class="login100-form">
         

          <span class="login100-form-title1 p-b-1 p-t-1">
            Restablecer contraseña
          </span>
          <br>
          <div class="wrap-input100 ">
            <input class="input100"  type="password" name="#" placeholder="Nueva contraseña" id="formNewPassword">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <div class="wrap-input100">
            <input class="input100" type="password" name="#" placeholder="Confirmar contraseña" id="formConfirmPassword">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" id="restaurar-cuenta">
              Guardar
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
      $("#restaurar-cuenta").click(function (e) { 
        e.preventDefault();

        if($("#formNewPassword").val() != "" && $("#formConfirmPassword").val() != ""
        && $("#formNewPassword").val().replace(/ /g,"").length > 6 && $("#formConfirmPassword").val().replace(/ /g,"").length > 6) {
          $.ajax({
            type: "POST",
            url: "asset/php/usuario/ajaxActualizarContra.php",
            data: {
              id_user: "<?php echo $_GET['u']?>",
              clave: $("#formNewPassword").val()
            },
            success: function (response) {
              if(response != -1) {
                alert("Contraseña actualizada");
                $(location).attr("href", "login.php");
              }
              else {
                alert("Tuvimos un problema, intente luego.");
              }
            }
          });
        }
        else {
          alert("La contraseña es menor a 6 caracteres");
        }
      });
    });
  </script>

</body>
</html>