<?php
include "cabecera.php";
?>
<h1 style="text-align:center;">Practicas</h1>
</div></nav></div><br>
<?php

include "../../api/conexion.php";

class Actividades extends baseDatos{
    function accion($tipo){ 
		switch($tipo){
			case 'listar':
				$laboratorio=mysqli_fetch_array($this->consulta("SELECT id from materia where nombre='".$_POST['ver']."';"));
				echo $this->despPracticas("SELECT * from practicas where id_materia='".$laboratorio[0]."';",
                "SELECT porcentaje from practicas where id_materia='".$laboratorio[0]."';");
				break;
		}
	}
}

$oUser = new Actividades();
if(isset($_POST['tipo'])){
	$oUser->accion($_POST['tipo']);
}else{
	$oUser->accion('listar');
}

include "footer.php";
?>
<!--<div class="bordes" style="width:70%;margin:auto;border-radius:0.5rem;">
<table>
	<tr>
		<div class="card" style="width: 500px;border-radius: 1rem;background-color:#212121;margin:auto;">
		<div class="card-body" style="border-radius: 1rem;background-color:#0E0E0F;">
			<h5 class="card-title">Practica de seguridad</h5>  
			<div class="progress"> 
				<div class="progress-bar" role="progressbar" style="width: 25%; background-color:green; color:#212121;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
			</div>
			<br>
			<a href="detalleActividad.php" class="btn btn-gris">Ver</a>
			<img class="icono" src="https://cdn-icons-png.flaticon.com/512/1828/1828970.png" alt="estrella">
		</div>
		</div> 
</tr>
</table>
</div>
<br>-->