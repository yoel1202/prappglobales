<?php
require_once "config.php";
    class Conexion 
    {
       
        private $conexion;
        
        function __construct()
        {
          
            $this->conectar_base_datos();    
        }
        
        private function conectar_base_datos()
        {
            $this->conexion = mysqli_connect(HOST, USER, PASS);
            mysqli_select_db($this->conexion, DBNAME) or die (mysqli_error($this->conection));
            mysqli_query($this->conexion, "SET NAMES 'utf8'" );
            
            return $this->conexion;
        }
        
        public function consulta($consulta){
            $this->resultado = mysqli_query($this->conexion, $consulta);
            if(!$this->resultado){ 
        echo    mysqli_error($this->conexion);
      
    }
    return $this->resultado;
        }


           public function desconectar()
    {
        
            mysql_close($this->$conexion);
        

    }
        
        public function extraer_registro(){
            if($fila = mysqli_fetch_row($this->resultado)){
                return $fila;
            }else{
                return false;
            }
            
        }
    }

?>