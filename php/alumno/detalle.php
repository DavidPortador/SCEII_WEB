<?php
    include('header.php');
?>
<!-- Contenido -->
  <h2>Usuario: <?=$_SESSION['correo']?></h2>
    <p>Message: <?=$_SESSION['message']?></p>
    <div class="container">
      <div class="form-det text-white">
        <i class="fa-solid fa-star" style="color:yellow;"></i> Detalles de la Actividad 1
        <div class="progress mt-3">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
        </div>
      </div>
    </div>
    <button type="button" class="btn btn-success btn-circle"><i class="fa-solid fa-plus"></i></button>
<!-- Fin de Contenido -->
<?php
    include('footer.php');
?>