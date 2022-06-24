<?php
    include('header.php');
?>
<!-- Contenido -->
<h2>Usuario: <?=$_SESSION['correo']?></h2>
  <p>Message: <?=$_SESSION['message']?></p>
  <div class="container">
    <p>Laboratorios del id: <?=$_SESSION['id']?></p>
    <a href="detalle.php">
      <div class="form-act text-white">
        <i class="fa-solid fa-star" style="color:yellow;"></i> Actividad 1
        <div class="progress mt-3">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
        </div>
      </div>
    </a>
    <br>
    <div class="form-act">
        <i class="fa-solid fa-star-half-stroke"></i> Actividad 2
        <div class="progress mt-3">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20">20%</div>
        </div>
    </div>
  </div>
  <button type="button" class="btn btn-success btn-circle"><i class="fa-solid fa-plus"></i></button>
<!-- Fin de Contenido -->
<?php
    include('footer.php');
?>