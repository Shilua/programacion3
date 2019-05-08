<?php
    class Producto{

        public $id;
        public $nombre;
        public $precio;
        public $imagen;
        public $usuario;
        

        public function __construct($id,$nombre,$precio,$usuario){
            
            $this->id = $id;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->usuario = $usuario;
        }

        
        public function ToJSON(){
            return json_encode($this);
        }

        public function ToCSV()
        {
            return $this->id.";".$this->nombre.";".$this->precio.";".$this->imagen.";".$this->usuario.";".PHP_EOL;
        }
    
        function toString()
        {
            return "ID :".$this->id. "<br> Nombre :".$this->nombre."</br> precio :".$this->precio."<br> Imagen :".$this->imagen."<br> Usuario :".$this->usuario."<br>";
        }
    }

    

?>