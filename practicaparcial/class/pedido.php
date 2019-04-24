<?php

    class Pedido
    {
        public $producto;
        public $idProveedor;
        public $cantidad;


        public __construct($producto,$cantidad,$idProveedor){
            $this->producto = $producto;
            $this->cantidad = $cantidad;
            $this->idProveedor = $idProveedor;
        }

        function toCSV()
        {
            return $this->producto.";".$this->cantidad.";".$this->$idProveedor.PHP_EOL;
        }
    }
    