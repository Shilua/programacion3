<?php

require_once "./clases/alumnoClass.php"; 

$alumno = new Alumno($_POST['legajo'],$_POST['dni'],$_POST['nombre'],$_POST['apellido']);

echo $alumno->ToJson();