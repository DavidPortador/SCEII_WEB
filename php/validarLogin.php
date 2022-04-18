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
						echo "=> ".$registro['tipoUsuario'];
						$_SESSION['nombre']=$registro['nombre']." ".$registro['apellidos'];
						$_SESSION['correo']=$registro['correo'];
						$_SESSION['tipoUsuario']=$registro['tipoUsuario'];
						if($$registro['tipoUsuario'] == "administrador"){
							header("location: administrador.php");
						}else if($$registro['tipoUsuario'] == "alumno"){
							header("location: alumno.php");
						}else if($$registro['tipoUsuario'] == "docente"){
							header("location: docente.php");
						}else if($$registro['tipoUsuario'] == "visitante"){
							header("location: visitante.php");
						}
					}
				}else{
					//echo "vacio";
					header("location: ../index.php?e=ne");
				}
				/*if($obj->numRegistros == 1){

					$_SESSION['nombre']=$registro->nombres." ".$registro->apellidos;
					$_SESSION['email']=$_POST['email'];
					$_SESSION['isAdmin']=false;
					if($registro->id_tipo == 1){
						$_SESSION['isAdmin']=true;
						header("location: administrador/home.php");
					}else{
						header("location: user/home.php");
					}

				}else{
					header("location: Login.php?e=1");
						}*/
			}else{
				header("location: ../index.php?e=va");
			}
		} catch (Exception $e) {
			header("location: ../index.php?e=ex");
			//echo "<div class='text-danger text-end'><b>Exception: </b></div>",  $e->getMessage(), "\n";
		}
		
?>