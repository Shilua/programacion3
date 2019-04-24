<?php

require_once "./class/proveedor.php";


function doGet()
{
    switch ($_GET['caso']) {
        case 'consultarProveedor':
            echo consultarProveedor($_GET['nombre']);
            break;
        
        default:
            echo proveedores();
            break;
    }
}

function consultarProveedor($get)
{
    $fileReference = fopen("data/proveedores.txt", "r");

    $proveedores = array();

    while (!feof($fileReference)) {
        $string = fgets($fileReference);
        $arrayString = explode(";",$string);
        if($arrayString[0] == "")
        {
            continue;
        }
        $id = $arrayString[0];
        $nombre = $arrayString[1];
        $email = $arrayString[2];
        $foto = $arrayString[3];
        $proveedor = new Proveedor($id,$nombre,$email);
        $proveedor->foto = $foto;
        array_push($proveedores,$proveedor);
    }

    foreach ($proveedores as $proveedor) {
        if($get == $proveedor->nombre)
        {
            return $proveedor->nombre;
        }
        else {
            return "No existe proveedor ". $get;
        }
    }
}

function proveedores()
{
    $fileReference = fopen("data/proveedores.txt", "r");
    $proveedores = array();
    while (!feof($fileReference)) {
        $string = fgets($fileReference);
        $arrayString = explode(";",$string);
        if($arrayString[0] == "")
        {
            continue;
        }
        $id = $arrayString[0];
        $nombre = $arrayString[1];
        $email = $arrayString[2];
        $foto = $arrayString[3];
        $proveedor = new Proveedor($id,$nombre,$email);
        $proveedor->foto = $foto;
        array_push($proveedores,$proveedor);
    }


    $stringReturn = "";     
    foreach ($proveedores as $proveedor) {
        $stringReturn = $stringReturn . $proveedor->toString();
        
    }
    return $stringReturn;
}