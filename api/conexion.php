<?php

    class baseDatos {

        private $server;
        private $user;
        private $password;
        private $database;
        private $port;
        private $conexion;

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
            if($filas >= 1){
                return $this->conexion->insert_id;
            }else{
                return 0;
            }
        }
        
        // UPDATE / DELETE
        public function nonQuery($sqlstr){
            $results = $this->conexion->query($sqlstr);
            return $this->conexion->affected_rows;
        }

    }

?>