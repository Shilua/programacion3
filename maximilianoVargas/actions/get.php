<?php

    function doGet()
    {
        $operation = $_GET['operacion'];

        switch($operation){
            case 'listarUsuarios':
                listarUsuarios();
                break;
            case 'login':
                login();
                break;
            case 'listarProductos':
                listarProductos();
                break;

            default:
                echo "Invalid Operation";
                break;
        }
    }   

    function listarUsuarios()
    {
        $nombreGet = $_GET['nombre'];

        $referenceFile = fopen("./data/usuarios.txt", "r");
        $arrayUsuarios =array();
        while(!feof($referenceFile))
        {
            $stringUsuario = fgets($referenceFile);
            $arrayDataUsuarios = explode(";",$stringUsuario);
            if($arrayDataUsuarios[0] == "")
                continue;
            $nombre = $arrayDataUsuarios[0];
            $clave = $arrayDataUsuarios[1];
            $usuarioNew = new Usuario($nombre,$clave);
            array_push($arrayUsuarios, $usuarioNew);            
        }
        fclose($referenceFile);
        $stringReturn = "";
    
        foreach ($arrayUsuarios as $usuario) {
            if(strtolower($usuario->nombre) == strtolower($nombreGet))
            {      
                $stringReturn = $stringReturn . $usuario->toString();
                break;
            }
        }

        if($stringReturn == "")
        echo "no existe ".$nombre;
        else
        echo $stringReturn;
    }

    function listarProductos()
    {
        $productos =array();
        $referenceFile = fopen("./data/productos.txt", "r");
        
        while(!feof($referenceFile))
        {
            $stringProducto = fgets($referenceFile);
            $arrayDataProducto = explode(";",$stringProducto);
            if($arrayDataProducto[0] == "")
                continue;
            $id = $arrayDataProducto[0];
            $nombre = $arrayDataProducto[1];
            $precio = $arrayDataProducto[2];
            $imagen = $arrayDataProducto[3];
            $usuario = $arrayDataProducto[4];

            $productoNew = new Producto($id,$nombre,$precio,$usuario);
            $productoNew->imagen = $imagen;
            array_push($productos, $productoNew);            
        }
        fclose($referenceFile);
        $stringReturn = "";

        if(isset($_GET['producto']))
        {
            foreach ($productos as $producto) {
                if($producto->nombre == $_GET['producto'])
                {
                    $stringReturn = $stringReturn. $producto->toString();
                }
            }
        }
        elseif (isset($_GET['usuario'])) {
            foreach ($productos as $producto) {
                if($producto->usuario == $_GET['usuario'])
                {
                    $stringReturn = $stringReturn. $producto->toString();
                }
            }
        }
        else{
            foreach ($productos as $producto) {
                $stringReturn = $stringReturn . $producto->toString();
            }
        }
        echo $stringReturn;
    }
?>