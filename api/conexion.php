<?php

    class baseDatos {

        private $server;
        private $user;
        private $password;
        private $database;
        private $port;
        private $conexion;

        var $numeroRegistros;

        // Constructor que inicializa la conexion
        function __construct(){
            $listadatos = $this->datosConexion();
            foreach ($listadatos as $key => $value) {
                $this->server = $value['server'];
                $this->user = $value['user'];
                $this->password = $value['password'];
                $this->database = $value['database'];
                $this->port = $value['port'];
            }
            $this->conexion = new mysqli($this->server,$this->user,$this->password,$this->database,$this->port);
            if($this->conexion->connect_errno){
                echo "Error, algo va mal con la conexion";
                die();
            }else{
                //echo "Conexion exitosa";
            }

        }

        // Obtener los datos de un JSON a un array
        private function datosConexion(){
            $direccion = dirname(__FILE__);
            $jsondata = file_get_contents($direccion . "/" . "config");
            return json_decode($jsondata, true);
        }

        /* OPERACIONES DEL CRUD */

        // SELECT
        function getQuery($sqlstr){
			if(strpos(strtoupper($sqlstr), "SELECT") !== false){
			    $bloque = mysqli_query($this->conexion, $sqlstr);
                $registro = mysqli_fetch_array($bloque);
				//$numRegistros = mysqli_num_rows($this->bloque);
			}else{
				$registro = null;
			}
			//mysqli_close($this->conexion);
			return $registro;
		}

        // INSERT 
        public function nonQueryId($sqlstr){
            $results = $this->conexion->query($sqlstr);
            $filas = $this->conexion->affected_rows;
            if($filas > 0){
                return $filas;
            }else{
                return 0;
            }
        }
        
        // UPDATE / DELETE
        public function nonQuery($sqlstr){
            $results = $this->conexion->query($sqlstr);
            return $this->conexion->affected_rows;
        }

        //

        function crearSelect($tabla, $campo, $value){
			$html = '<select name="id_'.$tabla.'">';
			$registros = $this->consulta("SELECT * FROM ".$tabla." order by id");
            $html .= '<option selected>'.$value.':</option>';
			foreach($registros as $registro) { 
				$html.= '<option value="'.$registro['id'].'">'.$registro[$campo].'</option>';
			}
			$html.= '</select>';
			return $html;
		}

        //
        function consulta($query){
            $bloque=mysqli_query($this->conexion, $query);
            if(strpos(strtoupper($query), "SELECT")!==false)//operador triple 
                $this->numeroRegistros=mysqli_num_rows($bloque);
            else $this->numeroRegistros=0;
            return $bloque;
        }

        function saca_registro($query){
            $this->consulta($query);
            return mysqli_fetch_object($this->bloque);
        }
        
        function despLaboratorios($query){
            $html='<div style="width:70%;margin:auto;border-radius:0.5rem;">
                    <table>';
            $bloque = $this->consulta($query);
            for ($i=0; $i < $this->numeroRegistros; $i++) { 
                $registro=mysqli_fetch_array($bloque);
                $html.='<tr>';
                $html.='<form action="actividades.php" method="post">';
                $html.='<div class="card" style="width: 500px;border-radius: 1rem;background-color:blue;margin:auto;">';
                $html.='<div class="card-body" style="border-radius: 1rem;background-color:blue;">';	
                $html.='<h5 class="card-title">'.$registro['nombre'].'</h5> ';		
                $html.='<br>';		
                $html.='<input type="submit" value="Entrar" class="btn btn-gris"/>
                        <input type="hidden" name="ver" value="'.$registro['nombre'].'"/>';
                $html.='<img class="icono" style="" src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" alt="estrella">';
                $html.='</div></div></form><br></tr>';
            }
            return $html.='</table></div>';
        }
        
        function despPracticas($query,$queryPorcen){
            $html='<div style="width:70%;margin:auto;border-radius:0.5rem;">
                    <table>';
            $bloque = $this->consulta($queryPorcen);
            $porcentajes=mysqli_fetch_array($bloque);
            $bloque = $this->consulta($query);
            for ($i=0; $i < $this->numeroRegistros; $i++) { 
                $registro=mysqli_fetch_array($bloque);
                if($registro['porcentaje']==100){
                    $colorPrim="green";
                    $colorSec="#212121";
                    $estrella="https://cdn-icons-png.flaticon.com/512/1828/1828884.png";
                    $porcentaje="100";
                }else{
                    $colorPrim="#212121";
                    $colorSec="green";
                    $estrella="https://cdn-icons-png.flaticon.com/512/1828/1828970.png";
                    $porcentaje=(String)$registro['porcentaje'];
                }
                $html.='<tr>';
                $html.='<form action="detalleActividad.php" method="post">';
                $html.='<div class="card" style="width: 500px;border-radius: 1rem;background-color:'.$colorPrim.';margin:auto;">';
                $html.='<div class="card-body" style="border-radius: 1rem;background-color:'.$colorPrim.';">';	
                $html.='<h5 class="card-title">'.$registro['nombre'].'</h5> ';		
                $html.='<div class="progress">';		
                $html.='<div class="progress-bar" role="progressbar" style="width:'.$porcentaje.'%; background-color:'.$colorSec.'; color:'.$colorPrim.';" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">'.$porcentaje.'%</div>';
                $html.='</div>';
                $html.='<input type="hidden" name="completado" value="'.$porcentaje.'"/>';
                if($porcentaje==100)
                    $html.='<p style="text-align:center;">Completado<p/>';
                else
                    $html.='<br>';		
                $html.='<input type="submit" value="aceptar" class="btn btn-gris"/>
                        <input type="hidden" name="ver" value="'.$registro['nombre'].'"/>';
                $html.='<img class="icono" style="" src="'.$estrella.'" alt="estrella">';
                $html.='</div></div></form><br></tr>';
            }
            return $html.='</table></div>';
        }

        function despActividades($query, $titulo, $completado){
            $html='<h1 style="text-align:center;">'.$titulo.'</h1>';
            if($completado==100){
                $html.='<h2 style="text-align:center;">Completado</h2>';
            }else{
                $html.='<h2 style="text-align:center;">En proceso</h2>';
            }	
            $html.='<br><div style="width:70%;margin:auto;border-radius:0.5rem;"><table>';
            $bloque = $this->consulta($query);
            for ($i=0; $i < $this->numeroRegistros; $i++) {
                $registro=mysqli_fetch_array($bloque);
                if($registro['realizado']=='s'){
                    $color="green";
                }else{
                    $color="#212121";
                }
                $html.='<tr><td style="width:100px;">';
                $html.='<div style="background-color:'.$color.';width:10px;height:60px;color:'.$color.';">.</div></td>';
                $html.='<td style="width:100px;padding-left:10px;"><i class="fa-solid fa-book fa-2x"></i></td>';	
                $html.='<td><p style="width:650px;padding-left:30px;font-size:x-large;">'.$registro['nombre'].'</p></td>';		
                $html.='<td style="width:100px;align-items:center;"><a href="alCinePuto7u7" class="btn btn-gris" style="">Hacer</a></td>';				
                $html.='</tr>';
            }
            $html.='</table></div><br>';
            $html.='<h2 style="text-align:center;">Porcentaje</h2>
                    <div style="width:80%; border:solid;border-color:#424141;margin:auto;border-radius:0.5rem;border-width:2px;">
                        <div class="progress"> 
                            <div class="progress-bar" role="progressbar" style="width: '.$completado.'%; background-color:green; color:white;" aria-valuenow="'.$completado.'" aria-valuemin="0" aria-valuemax="100">'.$completado.'%</div>
                        </div>
                    </div>';
            return $html;
        }

    }

?>