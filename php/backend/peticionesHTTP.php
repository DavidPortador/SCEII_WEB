<?php
	session_start();

    // Control de Errores
    set_error_handler(function($errno, $errstr, $errfile, $errline) {
        // error was suppressed with the @-operator
        if (0 === error_reporting()) {
            return false;
        }
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    });

    // peticiones generales al api
    function peticion($url, $datos, $method, $header=""){
        try {
            $datos = json_encode($datos);
            // Crear opciones de la petición HTTP
            $opciones = array(
                "http" => array(
                    "header" => "Content-type: application/x-www-form-urlencoded\r\n".$header,
                    "method" => $method,
                    "content" => $datos, // Agregar el contenido definido antes
                ),
            );
            // Preparar petición
            $contexto = stream_context_create($opciones);
            // Hacer peticion
            $resultado = file_get_contents($url, false, $contexto);
            return $resultado;
        } catch (Exception $e) {
            header("location: ../../index.php?e=ex");
        }
    }

    // Validacion de que existan los datos
    if(isset($_POST['correo']) and isset($_POST['clave'])){
        $url = "https://overhanded-extensio.000webhostapp.com/api-sceii/v1/routes/login.php";
        // Los datos de formulario
        $datos = [
            "correo" => $_POST['correo'],
            "clave" => $_POST['clave']
        ];

        try {
            $url = "https://overhanded-extensio.000webhostapp.com/api-sceii/v1/routes/login.php";
            // Los datos de formulario
            $datos = [
                "correo" => $_POST['correo'],
                "clave" => $_POST['clave']
            ];
            //echo $_POST['correo']. " -> ".$_POST['clave'];
            $datos = json_encode($datos);
            // Crear opciones de la petición HTTP
            $opciones = array(
                "http" => array(
                    "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                    "method" => "POST",
                    "content" => $datos, // Agregar el contenido definido antes
                ),
            );
            // Preparar petición
            $contexto = stream_context_create($opciones);
            // Hacer peticion
            $resultado = file_get_contents($url, false, $contexto);
            if ($resultado === false){
                header('location: ../index.php?e=4'); // Fallida 4
            }else{
                $datos = json_decode($resultado, true); //true retorna un arreglo (false un obj)
                //var_dump($datos);
                
                // Datos del API
                $_SESSION['message'] = $datos['message'];
                $_SESSION['token'] =  $datos['data']['token'];

                // Conversion del token
                $data = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $_SESSION['token'])[1]))), true);

                // Datos del Token
                $_SESSION['iat'] = $data['iat']; // fecha de creacion del token
                $_SESSION['exp'] = $data['exp']; // fecha de expiracion del token
                $_SESSION['id'] = $data['data']['id']; // data->id
                $_SESSION['correo'] = $data['data']['correo']; // data->correo
                $_SESSION['tipo'] = $data['data']['typeUser']; // data->typeUser

                echo $_SESSION['tipo']." -> ";
                echo $_SESSION['token'];

                if($_SESSION['tipo'] == "alumno"){
                    //header("location: ../alumno/home.php");
                }

            }
        } catch (Exception $e) {
            header("location: ../../index.php?e=ex");
        }
    }else{
        header("location: ../../index.php?e=va");
    }

?>