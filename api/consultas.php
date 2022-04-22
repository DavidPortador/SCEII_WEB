<?php

    require 'conexion.php';
    $obj = new baseDatos();

    // INSERTS

    if($_POST['metodo'] == "insertAlumno"){
        $query= "call insert_usuario_alumno('".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['correo']."','"
        .$_POST['clave']."','".$_POST['genero']."','".$_POST['fecha_nac']."','".$_POST['no_control']."','".$_POST['id_carrera']
        ."','".$_POST['id_semestre']."')";
        echo $query."\n";
        
        try{
            $obj->consulta($query);
            $arreglo = array();
            echo json_encode($arreglo);
        }catch(Exception $e){
            echo ($e);
        }
        
    }else if($_POST['metodo'] == "insertarDocente"){

    }else if($_POST['metodo'] == "insertarVisitante"){

    }

    // CUSTOMS

    if($_POST['metodo'] == "buscaMateria"){
        $obj->consulta("select * from materia where id= ".$_POST['id']);
        echo json_encode($obj->getArreglo());
    }else if($_POST['metodo'] == "validarUsuario"){
        
    }

?>