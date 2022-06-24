<?php
    session_start();
    if(!isset($_SESSION['tipoUsuario'])){
        header("location: ../../index.php?e=se");
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema SCEII</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="stylesheet" href="../../css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
</head>

<body>
    <div class="wrapper" style="width:100%;">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header text-center">
                <a href="home.php">
                    <h3>SCEII</h3>
                    <center>
                        <img src="../../assets/logo.png" style="width:100px;heigth:100px;" class="center-block"></img>    
                    </center>
                </a>
            </div>
            <ul class="list-unstyled components">
                <p class="text-center"><?=$_SESSION['nombre']?></p>
                <li>
                    <a href="home.php.php">Home</a>
                </li>
                <li>
                    <a href="#">Notificaiones</a>
                </li>
                <li>
                    <a href="#">Configuracion</a>
                </li>
                <li>
                    <a href="../../index.php" class="text-danger">Cerrar sesion</a>
                </li>
            </ul>
        </nav>
        <div>
        <div id="content" >
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
                <div class="container-fluid" >
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                    </button>