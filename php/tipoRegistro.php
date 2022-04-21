<?php
	include "head.php";
?>

<!-- Cuerpo de la página -->
<body class="text-white text-center">
	<div class="signupFrm">
    <h3 class="">Registro</h3>
		<!-- Formulario de sesión -->
		<div class="form-green">
			<h3 class="fw-normal">Registrarme como:</h3>
            <br>
			<form action="registro.php" method="post">
			    <input type="submit" name="jefeLab" class="regBtn mx-auto" value="Jefe de laboratorio" />
                <label class="fs-6">Requiere verificación adicional</label>
            </form>
            <form action="registro.php" method="post">
			    <input type="submit" name="docente" class="regBtn mx-auto formlg" value="Profesor" />
            </form>
            <form action="registro.php" method="post">
			    <input type="submit" name="alumno" class="regBtn mx-auto formlg" value="Alumno" />
            </form>
            <form action="registro.php" method="post">
			    <input type="submit" name="visitante" class="regBtn mx-auto formlg" value="Visitante" />
            </form>
        </div>
	</div>
</body>

<?php
	include "footer.php";
?>