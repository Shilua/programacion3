<?php

class Proveedor
{   
    public $id;
    public $nombre;
    public $email;
    public $foto;

    public function __construct($id,$nombre,$email)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function toCSV()
    {
        return $this->id.";".$this->nombre.";".$this->email.";".$this->foto.PHP_EOL;
    }

    public function toString()
    {
        return "Id :".$this->id."</br> Nombre :".$this->nombre."</br> Email :".$this->email."<br> Foto :".$this->foto."</br>";
    }
}
