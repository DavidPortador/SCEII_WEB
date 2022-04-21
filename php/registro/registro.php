<?php
	include "head.php";
?>

<body>
  <div class="signupFrm">
    <div class="wrapper">
      <form method="post" action="" class="form-green formlg">
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
              echo '<i class="fa-solid fa-robot fa-5x"></i>';
            }
          ?>
        </div>

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
        <select id="genero">
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

        <?php
          if(isset($_POST['jefeLab'])){
            echo '';
          }else if(isset($_POST['docente'])){
            echo '';
          }else if(isset($_POST['alumno'])){
            echo '
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
            </select>';
          }else if(isset($_POST['visitante'])){
            echo '
            <div class="inputContainer">
              <input id="institucion" type="text" class="input-green" placeholder="a" />
              <label id="lblin" class="labelform" >
              <i class="fa-solid fa-user"></i> Institución:
              </label>
            </div>
            <div class="inputContainer">
              <input id="fecha" type="date" class="input-green" placeholder="a" />
              <label id="lblfe" class="labelform" >
              <i class="fa-solid fa-calendar-days"></i> Fecha de visita:
              </label>
            </div>';
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

        <!-- Select de prueba -->

      </form>
    </div>
  </div>
</body>

<?php
	include "end.php";
?>