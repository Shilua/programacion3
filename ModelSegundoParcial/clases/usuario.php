<?php
    class Usuario
    {
        public $nombre;
        public $clave;
        public $sexo;

        public function __construct($nombre,$clave,$sexo){

            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->sexo = $sexo;
        }

    }
    