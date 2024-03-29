<?php
  session_start();
  session_unset();
  session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>SCEII</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="shortcut icon" href="assets/logo_splash.png">
		<script src="js/bootstrap.js"></script>
	</head>

	<!-- Cuerpo de la página -->
	<body class="text-white text-center">
		<div class="container">
			<div class="signupFrm">
				<img src="assets/logo.png" alt="logo" class="mx-auto d-block mb-3" width="140vw" height="140vh">
				<!-- Formulario de sesión -->
				<form method="post" action="php/backend/peticiones.php" class="form-green">
					<input type="hidden" name="operacion" value="login" />
					<h3 class="fw-normal">Iniciar Sesión</h3>
					<div class="inputContainer">
						<input name="correo" type="email" class="input-green" placeholder="a" required />
						<label class="labelform">
							<i class="fa-solid fa-envelope"></i> Correo:
						</label>
					</div>
					<div class="inputContainer">
						<input name="clave" type="password" class="input-green" placeholder="a" required />
						<label class="labelform">
							<i class="fa-solid fa-key"></i> Contraseña:
						</label>
					</div>

					<?php
						// Conexiones
						if(isset($_GET['c'])){
							if($_GET['c'] == "ok"){
								echo "<div class='text-success text-end'><b>Usuario insertado con exito</b></div>";
							}
						}
						// Excepciones
						if(isset($_GET['e'])){
							if($_GET['e'] == "ne"){
								echo "<div class='text-danger text-end'><b>Usuario incorrecto</b></div>";
							}else if($_GET['e'] == "va"){
								echo "<div class='text-danger text-end'><b>El usuario esta vacío</b></div>";
							}else if($_GET['e'] == "ex"){
								echo "<div class='text-danger text-end'><b>Ocurrio una Exception</b></div>";
							}else if($_GET['e'] == "se"){
								echo "<div class='text-danger text-end'><b>Inicie sesión</b></div>";
							}else if($_GET['e'] == "sp"){
								echo "<div class='text-danger text-end'><b>Error en la petición</b></div>";
							}
						}
					?>

					<a href="#">Olvide mi contraseña</a>
					<input type="submit" class="submitBtn mx-auto" value="Entrar" />
					<label>¿No tienes una cuenta?</label>
					<br>
					<a href="php/registro/tipoRegistro.php">Crear una cuenta</a>
					<br>

					<!-- Iconos con vinculos a redes sociales -->
					
					<a href="https://www.facebook.com/" target="_bank">
						<i class="fa-brands fa-facebook fa-2x"></i>
					</a>
					<a href="https://discord.com/" target="_bank">
						<i class="fa-brands fa-discord fa-2x"></i>
					</a>
					<a href="https://web.whatsapp.com/" target="_bank">
						<i class="fa-brands fa-whatsapp fa-2x"></i>
					</a>

					<!-- Iconos con vinculos a la Tienda

					<a href="https://play.google.com/store?hl=es" target="_bank">
						<i class="fa-brands fa-google-play fa-2x"></i>
					</a>

					<a href="https://www.apple.com/mx/app-store/" target="_bank">
						<i class="fa-brands fa-apple fa-2x"></i>
					</a>
					 -->
				</form>
			</div>
		</div>
		
	</body>
	
</html>