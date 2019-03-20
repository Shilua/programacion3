<?php

require_once "personaClass.php";

class Alumno extends Persona
{
    public $legajo;

    public function __construct($legajo,$dni,$nombre,$apellido){
        parent::__construct($dni,$nombre,$apellido);
        $this->legajo = $legajo;
    }

    public function ToJson(){
        return json_encode($this);
    }
}
