<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Alumno</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='script.js'></script>
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

    <!-- Contenido -->
    <div id="main">
      <button class="openbtn" onclick="side()"><i class="fa-solid fa-bars"></i> OPCIONES SCEII</button>  
      <div class="container contenido">
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

    </div>
    </div>
    <script>
      var barra = false;
      function side(){
        if(barra){
          closeNav();
          barra = false;
        }else{
          openNav();
          barra = true;
        }
      }
      function openNav() {
        document.getElementById("mySidebar").style.width = "350px";
        document.getElementById("main").style.marginLeft = "350px";
        /*document.getElementById("mySidebar").class = "openside";
        document.getElementById("main").class = "alignopenside";*/
      }
      function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
      }
    </script>
    
</body>
</html>