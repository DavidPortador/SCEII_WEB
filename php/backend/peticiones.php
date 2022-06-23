<?php

    // Menu de peticiones posibles
    if(isset($_POST['operacion'])){
        switch ($_POST['operacion']) {
            case 'login':
                login();
                break;
            case 'registro':
                registro();
                break;
            default:
                header("location: ../../index.php?e=sp"); // Sin Peticiones
                break;
        }
    }

    // Sintaxis de una peticion http
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

    function login(){
        if(isset($_POST['correo']) and isset($_POST['clave'])){
            try {
                $url = "https://overhanded-extensio.000webhostapp.com/api-sceii/v1/routes/login.php";
                // Los datos de formulario
                $datos = [
                    "correo" => $_POST['correo'],
                    "clave" => $_POST['clave']
                ];
                $resultado = peticion($url, $datos, "POST", "");
                if ($resultado === false){
                    header('location: ../../index.php?e=ne'); // Fallida 4
                }else{
                    $datos = json_decode($resultado, true); //true retorna un arreglo (false un obj)
                    //var_dump($datos);
                    
                    if(isset($datos['data']['token'])){ // validacion de que existe el token
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

                    }else{
                        header("location: ../../index.php?e=ne");
                    }
                    
                }
            } catch (Exception $e) {
                header("location: ../../index.php?e=ex");
            }
        }
    }

    function registro(){
        if(isset($_POST['metodo'])){
            if($_POST['nombre'] != null and $_POST['apellidos'] != null and
            $_POST['correo'] != null and $_POST['clave'] != null and
            $_POST['genero'] != null and $_POST['fecha_nacimiento'] != null){
                switch($_POST['metodo']){
                    case 'insertarJefeLab':
                        /* YO NO ENTIENDOS ~DP */
                        break;
                    case 'insertarDocente':
                        
                        break;
                    case 'insertarAlumno':
                        if($_POST['no_control'] != null and $_POST['id_carrera'] != null and
                        $_POST['id_semestre'] != null){
                            inAlumno();
                        }else{
                            header("location: ../../index.php?e=va");
                        }
                        break;
                    case 'insertarVisitante':
                        
                        break;  
                    default:
                        header("location: ../../index.php?e=sp"); // Sin Peticiones
                        break;
                }
            }else{
                header("location: ../../index.php?e=va");
            }
        }else{
            header("location: ../../index.php?e=sp");
        }
    }

    function inAlumno(){
        $url = "https://sceii.000webhostapp.com/api-sceii/v1/routes/registro.php?tipo=alumno";
        // Los datos de formulario
        $datos = [
            "nombre" => $_POST['nombre'],
            "apellidos" => $_POST['apellidos'],
            "correo" => $_POST['correo'],
            "clave" => $_POST['clave'],
            "genero" => $_POST['genero'],
            "fecha_nacimiento" => $_POST['fecha_nacimiento'],
            "no_control" => $_POST['no_control'],
            "id_carrera" => $_POST['id_carrera'],
            "id_semestre" => $_POST['id_semestre']
        ];
        $resultado = peticion($url, $datos, "POST", "");
        if ($resultado === false){
            header('location: ../../index.php?e=ne'); // Fallida 4
        }else{
            $datos = json_decode($resultado, true); //true retorna un arreglo (false un obj)
            //var_dump($datos);
            
            if(isset($datos['data']['token'])){ // validacion de que existe el token
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

            }else{
                header("location: ../../index.php?e=ne");
            }
        }
    }
    
?>