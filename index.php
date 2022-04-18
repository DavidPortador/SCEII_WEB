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
		<div class="signupFrm">
			<!-- Formulario de sesión -->
			<form method="post" action="php/validarLogin.php" class="form-green">
				<img src="assets/logo.png" alt="logo" width="140" height="140">
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
					if(isset($_GET['e'])){
						if(isset($_GET['e']) == "ne"){
							echo "<div class='text-danger text-end'><b>Usuario incorrecto</b></div>";
						}else if(isset($_GET['e']) == "va"){
							echo "<div class='text-danger text-end'><b>El usuario esta vacío</b></div>";
						}else if(isset($_GET['e']) == "ex"){
							echo "<div class='text-danger text-end'><b>Ocurrio una Exception</b></div>";
						}
					}
				?>

				<a href="#">Olvide mi contraseña</a>
				<input type="hidden" name="metodo" value="vallidarUsuario"/>
				<input type="submit" class="submitBtn mx-auto" value="Entrar" />
				<label>¿No tienes una cuenta?</label>
				<br>
				<!-- Iconos con vinculos a redes sociales -->
				<a href="php/registro.php">Crear una cuenta</a>
				<br>
				<a href="https://www.facebook.com/" target="_bank">
					<i class="fa-brands fa-facebook fa-2x"></i>
				</a>
				<a href="https://discord.com/" target="_bank">
					<i class="fa-brands fa-discord fa-2x"></i>
				</a>
				<a href="https://web.whatsapp.com/" target="_bank">
					<i class="fa-brands fa-whatsapp fa-2x"></i>
				</a>

			</form>
		</div>
	</body>
</html>