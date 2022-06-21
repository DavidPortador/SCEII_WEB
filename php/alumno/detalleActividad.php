<?php
	include "head.php";
	include "../../api/conexion.php";
?>

				<h1 style="text-align:center;">Laboratorios</h1>
			</div>
		</nav>
	</div>
	<br>

<?php


class detalle extends baseDatos{
    function accion($tipo){ 
		switch($tipo){
			case 'listar':
				$practica=mysqli_fetch_array($this->consulta("SELECT id from practicas where nombre='".$_POST['ver']."';"));
				echo $this->despActividades("SELECT * from actividades where id_practica=".$practica[0], $_POST['ver'], $_POST['completado']);
				break;
		}
	}
}

$oUser = new detalle();
if(isset($_POST['tipo'])){
	$oUser->accion($_POST['tipo']);
}
else{
	$oUser->accion('listar');
}

include "footer.php";
?>
	<!--<tr>
		<td style="width:100px;">
		<div style="background-color:green;width:10px;height:60px;color:green;">.</div>
		</td>
		<td style="width:100px;padding-left:10px;"><img class="iconoAct" src="https://cdn-icons.flaticon.com/png/512/3624/premium/3624883.png?token=exp=1650243598~hmac=9a885466f80f9c56c9312bec04a8d874" alt="libreta"> </td>
		<td><p style="width:650px;padding-left:30px;font-size:x-large;">Nombre actividad</p></td>
		<td style="width:100px;align-items:center;"><a href="alCinePuto7u7" class="btn btn-gris" style="">Hacer</a></td>
	</tr>
	<tr>
		<td style="width:100px;"><div style="background-color:white;width:10px;height:60px;color:white;">.</div></td>
		<td style="width:100px;padding-left:10px;"><img class="iconoAct" src="https://cdn-icons.flaticon.com/png/512/3624/premium/3624883.png?token=exp=1650243598~hmac=9a885466f80f9c56c9312bec04a8d874" alt="libreta"> </td>
		<td><p style="width:650px;padding-left:30px;font-size:x-large;">Nombre actividad</p></td> 
		<td style="width:100px;align-items:center;"><a href="alCinePuto7u7" class="btn btn-gris" style="">Hacer</a></td>
	</tr>-->