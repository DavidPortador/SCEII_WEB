<?php
	session_start();
	include "conexion.php";
		try {
			$obj = new baseDatos();

			if($_POST['metodo'] == "insertarJefeLab"){
				/* NO ENTIENDOS */
			}else if($_POST['metodo'] == "insertarDocente"){
				if($_POST['nombre'] != null and $_POST['apellidos'] != null and
				$_POST['correo'] != null and $_POST['clave'] != null and
				$_POST['genero'] != null and $_POST['fecha_nac'] != null){
					$query = "call insert_usuario_docente('".
						$_POST['nombre']."','".
						$_POST['apellidos']."','".
						$_POST['correo']."','".
						$_POST['clave']."','".
						$_POST['genero']."','".
						$_POST['fecha_nac']."');";
					//echo $query."\n";
					$in = $obj->nonQueryId($query);
					if($in > 0){
						header("location: ../index.php?e=ok");
					}else{
						header("location: ../php/registro/tipoRegistro.php?e=ni"); // NoInsertado
					}
				}else{
					header("location: ../php/registro/tipoRegistro.php?e=va"); // VAcio
				}
			}else if($_POST['metodo'] == "insertarAlumno"){
				if($_POST['nombre'] != null and $_POST['apellidos'] != null and
				$_POST['correo'] != null and $_POST['clave'] != null and
				$_POST['genero'] != null and $_POST['fecha_nac'] != null and
				$_POST['no_control'] != null and $_POST['id_carrera'] != null and
				$_POST['id_semestre'] != null){
					$query = "call insert_usuario_alumno('".
						$_POST['nombre']."','".
						$_POST['apellidos']."','".
						$_POST['correo']."','".
						$_POST['clave']."','".
						$_POST['genero']."','".
						$_POST['fecha_nac']."','".
						$_POST['no_control']."','".
						$_POST['id_carrera']."','".
						$_POST['id_semestre']."');";
					//echo $query."\n";
					$in = $obj->nonQueryId($query);
					if($in > 0){
						header("location: ../index.php?e=ok");
					}else{
						header("location: ../php/registro/tipoRegistro.php?e=ni"); // NoInsertado
					}
				}else{
					header("location: ../php/registro/tipoRegistro.php?e=va"); // VAcio
				}
			}else if($_POST['metodo'] == "insertarVisitante"){
				if($_POST['nombre'] != null and $_POST['apellidos'] != null and
				$_POST['correo'] != null and $_POST['clave'] != null and
				$_POST['genero'] != null and $_POST['fecha_nac'] != null and 
				$_POST['institucion'] != null and $_POST['fecha']){
					$query = "call insert_usuario_visitante('".
						$_POST['nombre']."','".
						$_POST['apellidos']."','".
						$_POST['correo']."','".
						$_POST['clave']."','".
						$_POST['genero']."','".
						$_POST['fecha_nac']."','".
						$_POST['institucion']."','".
						$_POST['fecha']."');";
					//echo $query."\n";
					$in = $obj->nonQueryId($query);
					if($in > 0){
						header("location: ../index.php?e=ok");
					}else{
						header("location: ../php/registro/tipoRegistro.php?e=ni"); // NoInsertado
					}
				}else{
					header("location: ../php/registro/tipoRegistro.php?e=va"); // VAcio
				}
			}

		} catch (Exception $e) {
			header("location: ../index.php?e=ex");
		}
		
?>