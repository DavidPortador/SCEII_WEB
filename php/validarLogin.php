<?php
	session_start();
	include "../api/conexion.php";
		try {
			if(isset($_POST['correo']) and isset($_POST['clave'])){
				$obj = new baseDatos();
				$registro=$obj->getQuery("SELECT * FROM usuario 
					WHERE correo='".$_POST['correo']."' 
					AND clave=password('".$_POST['clave']."');");
				//echo "correo: ".$_POST['correo']." pass: ".$_POST['clave'];
				if($registro != null){
					if(count($registro) > 0){

						// USUARIO VALIDO
						$_SESSION['nombre']=$registro['nombre']." ".$registro['apellidos'];
						$_SESSION['correo']=$registro['correo'];
						$_SESSION['tipoUsuario']=$registro['tipoUsuario'];

						// Redireccionamiento dependiendo el tipo de usuario
						if($registro['tipoUsuario'] == "administrador"){
							header("location: administrador.php");
						}else if($registro['tipoUsuario'] == "alumno"){ //alumno
							header("location: alumno/laboratorios.php");
						}else if($registro['tipoUsuario'] == "docente"){
							header("location: docente.php");
						}else if($registro['tipoUsuario'] == "visitante"){
							header("location: visitante.php");
						}
					}
				}else{
					header("location: ../index.php?e=ne");
				}
			}else{
				header("location: ../index.php?e=va");
			}
		} catch (Exception $e) {
			header("location: ../index.php?e=ex");
		}
		
?>