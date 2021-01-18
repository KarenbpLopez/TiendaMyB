<?php
    session_start();
    if(isset($_SESSION) && isset($_SESSION["id_emp"]) && $_SESSION["id_emp"] != "") {
        header("Location: index3.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>M Y B</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="images/icons/favicon3.png"/>
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
			<div class="wrap-login100">

				<form class="login100-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-account"></i>
					</span>

					<span class="login100-form-title p-b-10 p-t-10">
						Bienvenido
					</span>
					<span class="login100-form-title1 p-b-10">
						Tienda M Y B
					</span>

					<div class="wrap-input100 ">
						<input class="input100"  name="#" placeholder="usuario" id="formCorreoLogin">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100">
						<input class="input100" type="password" name="#" placeholder="contraseña" id="formClaveLogin">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="entrar-sistema">
							Entrar
						</button>
					</div>

					<div class="text-center p-t-20">
						<a class="txt1" href="enviarCorreo.php">
							¿Olvido la contraseña?
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

	<script src="sweetalert/sweetalert2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="sweetalert/sweetalert2.min.css" />

	<script>
		$(document).ready(function () {
			$("#entrar-sistema").click(function (e) { 
				e.preventDefault();
				
				if($("#formCorreoLogin").val() != "" && $("#formClaveLogin").val() != "") {
					$.ajax({
						type: "POST",
						url: "asset/php/usuario/ajaxLogin.php",
						data: {
							correo: $("#formCorreoLogin").val(),
							clave: $("#formClaveLogin").val()
						},
						success: function (response) {
							if(response != -1) {
								Swal.fire(
  									'Bienvenido',
  									
  									'success'
								)
								$(location).attr("href","index3.php");
							}
							else {
								alert("Datos incorrectos");
							}
						}
					});
				}
				else {
					alert("Primero rellene los datos");
				}
			});
		});
	</script>

</body>
</html>