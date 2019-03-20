<?php
    /*$nombre = "Maxi";
    $legajo = 111;

    echo $nombre.$legajo."<br>";

    var_dump($legajo);
    var_dump($nombre);
    
    //Array numerico indisado, Array asociativo, Array multidimisional
    //Array indisado
    $heroes = array(1,2,3,4,5);
    $heroes[] = 22;
    var_dump($heroes);

    //array asociativo
    $heroes2 = array("nombre" => "Batman", "superpoder" => "batimovil");
    // $heroes2["nombre"] = "Batman";
    var_dump($heroes2);
    foreach ($heroes2 as $item => $valor) {
        echo $item ;
    }
    "<br>";
    var_dump($_POST);

    
    $lista = array(1,2,3,4,5,6,7,8,9,10);
    var_dump($lista);
    shuffle($lista);
    var_dump($lista);
    if($_GET["orden"]=="1")
    {
        echo "Orden ascendente <br>";
        asort($lista);
        var_dump($lista);
    }
    else
    {
        echo "Orden decendente <br>";
        arsort($lista);
        var_dump($lista);
    }*/

    $persona = array("nombre" => "pepe");

    var_dump($persona);

    echo $persona["nombre"];

    $personaO=(object)$persona;

    var_dump($personaO);

    $personaO->nombre = "mario";

    $personaStd = new StdClass();
    $personaStd->nombre = "juan";

    var_dump($personaStd);
    
?>