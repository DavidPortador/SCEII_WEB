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
      <form method="post" action="" class="form-green">
        <h3 class="fw-normal text-center">Registro</h3>
        <img id="imgTipo" class="imgTipo" src="../assets/alumno.png" />
        <select id="tipoUsuario" onchange="ShowSelected();">
          <option value="alumno" selected>Alumno</option>
          <option value="docente">Docente</option>
          <option value="visitante">Visitante</option>
        </select>

        <script type="text/javascript">
          function ShowSelected(){
            var tipo = document.getElementById("tipoUsuario").value;
            document.getElementById('imgTipo').src = "../assets/"+tipo+".png";
            if(tipo == "alumno"){ // alumno
              setAlumno("block");
              setVisitante("none");
            }else if(tipo == "docente"){ // docente
              setAlumno("none");
              setVisitante("none");
            }else if(tipo == "visitante"){ // visitante
              setAlumno("none");
              setVisitante("block");
            }
          }
          function setAlumno(disp){ // Alumnos
            document.getElementById('no_control').style.display = disp;
            document.getElementById('lblnc').style.display = disp;
            document.getElementById('carreras').style.display = disp;
            document.getElementById('semestres').style.display = disp;
          }
          function setVisitante(disp){ // Visitantes
            document.getElementById('institucion').style.display = disp;
            document.getElementById('lblin').style.display = disp;
            document.getElementById('fecha').style.display = disp;
            document.getElementById('lblfe').style.display = disp;
          }
        </script>

        <div class="inputContainer">
          <input id="nombre" type="text" class="input-green" placeholder="a" required />
          <label class="labelform">
          <i class="fa-solid fa-user"></i> Nombre:
          </label>
        </div>
        <div class="inputContainer">
          <input id="apellidos" type="text" class="input-green" placeholder="a" required />
          <label class="labelform">
          <i class="fa-solid fa-user"></i> Apellidos:
          </label>
        </div>
        <div class="inputContainer">
          <input id="correo" type="email" class="input-green" placeholder="a" required />
          <label class="labelform">
          <i class="fa-solid fa-envelope"></i> Correo:
          </label>
        </div>
        <div class="inputContainer">
          <input id="clave" type="password" class="input-green" placeholder="a" required />
          <label class="labelform">
          <i class="fa-solid fa-key"></i> Contraseña:
          </label>
        </div>
        <select id="clave">
          <option selected>Genero:</option>
          <option value="f">Femenino</option>
          <option value="m">Masculino</option>
          <option value="o">Otre</option>
        </select>
        <div class="inputContainer">
          <input id="fecha_Nac" type="date" class="input-green" placeholder="a" required />
          <label class="labelform">
          <i class="fa-solid fa-calendar-days"></i> Fecha de Nacimiento:
          </label>
        </div>
          
        <!-- Alumno -->

        <div class="inputContainer">
          <input id="no_control" type="text" class="input-green" placeholder="a" />
          <label id="lblnc" class="labelform">
          <i class="fa-solid fa-id-card"></i> No. Control:
          </label>
        </div>
        <select id="carreras">
          <option selected>Carrera:</option>
          <option value="">listado de carreras disponibles...</option>
        </select>
        <select id="semestres">
          <option selected>Semestre:</option>
          <option value="">listado de semestres disponibles...</option>
        </select>

        <!-- visitante -->

        <div class="inputContainer">
          <input id="institucion" type="text" class="input-green" placeholder="a" style="display:none;" />
          <label id="lblin" class="labelform" style="display:none;">
          <i class="fa-solid fa-user"></i> Institución:
          </label>
        </div>
        <div class="inputContainer">
          <input id="fecha" type="date" class="input-green" placeholder="a" style="display:none;" />
          <label id="lblfe" class="labelform" style="display:none;">
          <i class="fa-solid fa-calendar-days"></i> Fecha de visita:
          </label>
        </div>

        <!-- Botones -->

        <table class="table table-bordered">
            <td>
              <a class="cancelBtn" href="../index.php">Cancelar</a>
            </td>
            <td>
              <input type="submit" class="submitBtn" value="Registrar" />
            </td>
        </table>

      </form>
    </div>
  </div>
</body>
</html>