<?php
  session_start();
  if(!isset($_SESSION['token'])){
    header("location: ../../index.php?e=se");
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
		<title>Alumno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../css/side.css">
		<link rel="shortcut icon" href="../../assets/logo_splash.png">
  </head>
  <body>
    <div id="mySidebar" class="sidebar">
      <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>-->
      <div class="sidebar-header text-center">
          <a href="home.php">
              <h3 class="">SCEII</h3>
              <img src="../../assets/logo.png" style="width:100px;heigth:100px;" class="center-block"></img>    
          </a>
      </div>
      <a href=""><i class="fas fa-bell fa-1x"></i> Notificaciones</a>
      <a href=""><i class="fas fa-gear fa-1x"></i> Configuración</a>
      <a href=""><i class="fas fa-user fa-1x"></i> Perfil</a>
      <a href=""><i class="fa-solid fa-book"></i> IDK</a>
      <a class="text-danger" href="../../index.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión</a>
    </div>
    <div id="main">
      <button class="openbtn" onclick="side()"><i class="fa-solid fa-bars"></i> OPCIONES SCEII</button>  
      <div class="container contenido">