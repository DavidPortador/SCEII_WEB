<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/styles.css">
		<link rel="shortcut icon" href="../assets/logo_splash.png">
	<title>Registro</title>
</head>
<body>
  <div class="signupFrm">
    <div class="wrapper">
      <form action="" class="form-green">
        <h1 class="title">Registro</h1>

        <div class="inputContainer">
          <input type="text" class="input-green" placeholder="a">
          <label class="labelform">
          <i class="fa-solid fa-user"></i> Nombre
          </label>
        </div>

        <div class="inputContainer">
          <input type="text" class="input-green" placeholder="a">
          <label class="labelform">
          <i class="fa-solid fa-user"></i> Apellidos
          </label>
        </div>

        <div class="inputContainer">
          <input type="text" class="input-green" placeholder="a">
          <label class="labelform">
          <i class="fa-solid fa-envelope"></i> Correo
          </label>
        </div>

        <div class="inputContainer">
          <input type="text" class="input-green" placeholder="a">
          <label class="labelform">
          <i class="fa-solid fa-id-card"></i> No. Control
          </label>
        </div>

        <div class="inputContainer">
          <input type="text" class="input-green" placeholder="a">
          <label class="labelform">
          <i class="fa-solid fa-key"></i> Contraseña
          </label>
        </div>

        <select>
          <option selected>Genero</option>
          <option value="f">Femenino</option>
          <option value="m">Masculino</option>
          <option value="o">Otre</option>
        </select>

        <select>
          <option selected>Carrera</option>
          <option value="">listado de carreras disponibles...</option>
        </select>

        <select>
          <option selected>Semestre</option>
          <option value="">listado de semestres disponibles...</option>
        </select>

        <div class="inputContainer">
          <input type="date" class="input-green" placeholder="a">
          <label class="labelform">
          <i class="fa-solid fa-calendar-days"></i> Fecha de Nacimiento
          </label>
        </div>

        <a class="cancelBtn mx-auto" href="../index.html">Cancelar</a>
        <input type="submit" class="submitBtn mx-auto" value="Registrar" />

      </form>
    </div>
  </div>
</body>
</html>