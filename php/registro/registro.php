<?php
	include "head.php";
  include "../../api/conexion.php";
?>

<body>
  <div class="signupFrm">
    <div class="wrapper">
      <form method="post" action="../../api/insertarRegistro.php" class="form-green formlg">
        <h3 class="fw-normal text-center">Registro</h3>

        <div class="text-center formlg">
          <?php
            if(isset($_POST['jefeLab'])){
              echo '<i class="fa-solid fa-code fa-5x"></i>';
            }else if(isset($_POST['docente'])){
              echo '<i class="fa-solid fa-chalkboard-user fa-5x"></i>';
            }else if(isset($_POST['alumno'])){
              echo '<i class="fa-solid fa-graduation-cap fa-5x"></i>';
            }else if(isset($_POST['visitante'])){
              echo '<i class="fa-solid fa-rocket fa-5x"></i>';
            }else{
              header("location: tipoRegistro.php?e=tr"); // Tipo de Registro
            }
          ?>
        </div>

        <div class="inputContainer">
          <input name="nombre" type="text" class="input-green" placeholder="a" required />
          <label class="labelform">
          <i class="fa-solid fa-user"></i> Nombre:
          </label>
        </div>
        <div class="inputContainer">
          <input name="apellidos" type="text" class="input-green" placeholder="a" required />
          <label class="labelform">
          <i class="fa-solid fa-user"></i> Apellidos:
          </label>
        </div>
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
        <select name="genero">
          <option selected>Genero:</option>
          <option value="f">Femenino</option>
          <option value="m">Masculino</option>
          <option value="o">Otre</option>
        </select>
        <div class="inputContainer">
          <input name="fecha_nac" type="date" class="input-green" placeholder="a" required />
          <label class="labelform">
          <i class="fa-solid fa-calendar-days"></i> Fecha de Nacimiento:
          </label>
        </div>

        <?php
          if(isset($_POST['jefeLab'])){
            echo '<input name="metodo" type="hidden" value="insertarJefeLab" />';
          }else if(isset($_POST['docente'])){
            echo '<input name="metodo" type="hidden" value="insertarDocente" />';
          }else if(isset($_POST['alumno'])){
            echo '<input name="metodo" type="hidden" value="insertarAlumno" />';
            echo '
            <div class="inputContainer">
              <input name="no_control" type="text" class="input-green" placeholder="a" />
              <label id="lblnc" class="labelform">
                <i class="fa-solid fa-id-card"></i> No. Control:
              </label>
            </div>';
            $obj = new baseDatos();
            echo $obj->crearSelect("carrera", "nombre", "Carrera");
            echo $obj->crearSelect("semestre", "nombre", "Semestre");
          }else if(isset($_POST['visitante'])){
            echo '<input name="metodo" type="hidden" value="insertarVisitante" />';
            echo '
            <div class="inputContainer">
              <input name="institucion" type="text" class="input-green" placeholder="a" />
              <label id="lblin" class="labelform" >
                <i class="fa-solid fa-user"></i> Institución:
              </label>
            </div>';
          }else{
            header("location: tipoRegistro.php?e=tr"); // Tipo de Registro
          }
        ?>
          
        <!-- Botones -->

        <table>
            <td>
              <a class="cancelBtn" href="../../index.php">Cancelar</a>
            </td>
            <td>
              <input type="submit" class="submitBtn" value="Registrar" />
            </td>
        </table>

      </form>
    </div>
  </div>
</body>

<?php
	include "end.php";
?>