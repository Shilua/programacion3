<?php
    require "../clase01/clase1/clases/alumnoClass.php";

    $alumnoUno = new Alumno($_POST["legajo"],$_POST["dni"],$_POST["nombre"],$_POST["apellido"]);
    $alumnoDos = new Alumno($_POST["legajoDos"],$_POST["dniDos"],$_POST["nombreDos"],$_POST["apellidoDos"]);

    $arrayAlumnosJson = array($alumnoUno,$alumnoDos);

    
    $file = fopen("miarchivo.json", "w");
    $string = json_encode($arrayAlumnosJson);
    fwrite($file, $string);
    fclose($file);

    //var_dump($arrayAlumnosJson);

    
