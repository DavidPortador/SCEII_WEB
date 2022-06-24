<?php
  include('header.php');
?>
<!-- Contenido -->
  <h2>Usuario: <?=$_SESSION['correo']?></h2>
  <p>Message: <?=$_SESSION['message']?></p>
  <div class="container">
    <p>Laboratorios del id: <?=$_SESSION['id']?></p>
    <a href="actividades.php">
      <div class="form-lab text-white">
          <i class="fa-solid fa-star" style="color:yellow;"></i> Laboratorio 1
      </div>
    </a>
    <br>
    <div class="form-lab">
    <i class="fa-solid fa-star-half-stroke"></i> Laboratorio 2
    </div>
  </div>
  <button type="button" class="btn btn-success btn-circle"><i class="fa-solid fa-plus"></i></button>
<!-- Fin de Contenido -->
<?php
  include('footer.php');
?>   