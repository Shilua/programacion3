<?php
    class Usuario{

        public $nombre;
        public $clave;


        public function __construct($nombre,$clave){

            $this->nombre = $nombre;
            $this->clave = $clave;
        }

        
        public function ToJSON(){
            return json_encode($this);
        }

        public function ToCSV()
        {
            return $this->nombre.";".$this->clave.";".PHP_EOL;
        }
    
        function toString()
        {
            return "Nombre :".$this->nombre."</br> clave :".$this->clave."<br>";
        }
    }

    

?>