<?php
	session_start();
    if(isset($_POST['correo']) and isset($_POST['clave'])){
        $url = "https://overhanded-extensio.000webhostapp.com/api-sceii/v1/routes/login.php";
        // Los datos de formulario
        $datos = [
            "correo" => $_POST['correo'],
            "clave" => $_POST['clave']
        ];
        echo $_POST['correo']. " -> ".$_POST['clave'];
        // Crear opciones de la petición HTTP
        $opciones = array(
            "http" => array(
                "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                "method" => "POST",
                "content" => http_build_query($datos), // Agregar el contenido definido antes
            ),
        );
        // Preparar petición
        $contexto = stream_context_create($opciones);
        // Hacer peticion
        $resultado = file_get_contents($url, false, $contexto);
        echo " ->".$resultado."<- ";
        if ($resultado === false){
            //header('location: ../index.php?e=4'); // Fallida 4
            $datos = json_decode($resultado);
            var_dump($datos);
            echo "error ".$datos;
        }else{
            $datos = json_decode($resultado);
            var_dump($datos);
            //header('location: ../proyecto.php?c=1'); // Exitosa
        }
    }  
		
?>