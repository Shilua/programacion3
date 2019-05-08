<?php 
    include_once('classes/usuario.php');
    include_once('classes/producto.php');
    
    function doPost(){
        $operation = $_POST['operacion'];

        switch($operation){
            case 'crearUsuario':
                crearUsuario();
                break;

            case 'login':
                if(login()){
                    echo "true";
                }
                else{
                    echo "false";
                }
                break;

            case 'cargarProducto':
                cargarProducto();
                break;

            case 'modificarProducto':
                modificarProducto();
                break;

            default:
                echo "Invalid Operation";
                break;
        }
    }


    function crearUsuario()
    {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];

        if(validarNombre($nombre)){
            $usuario = new Usuario($nombre,$clave);
            $referenceFile = fopen("./data/usuarios.txt", "a");
            $stringToFile = "";
            $stringToFile = $stringToFile . $usuario->ToCSV();
            fwrite($referenceFile, $stringToFile);
            fclose($referenceFile);
            echo "usuario agregado correctamente";
        }
        else{
            echo "el nombre del usuario ya existe";
        }
    }

    function login()
    {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];

        $referenceFile = fopen("./data/usuarios.txt", "r");
        $arrayUsuarios =array();
        while(!feof($referenceFile))
        {
            $stringUsuario = fgets($referenceFile);
            $arrayDataUsuarios = explode(";",$stringUsuario);
            if($arrayDataUsuarios[0] == "")
                continue;
            array_push($arrayUsuarios, $arrayDataUsuarios);            
        }
        fclose($referenceFile);
        $retorno  = false;
        foreach ($arrayUsuarios as $usuario) {
            if($usuario[0] == $nombre && $usuario[1] == $clave)
            {
                $retorno = true;
                break;
            }
        }
        
        return $retorno;
    }

    function validarNombre($nombreConsulta)
    {
        $validate = true;
        $referenceFile = fopen("./data/usuarios.txt", "r");

        while(!feof($referenceFile))
        {
            $stringUsuario = fgets($referenceFile);
            $arrayDataUsuarios = explode(";",$stringUsuario);
            if($arrayDataUsuarios[0] == "")
                continue;

            if(strtolower($arrayDataUsuarios[0]) == strtolower($nombreConsulta)){
                 $validate = false;
            }

        }
        fclose($referenceFile);
        return $validate;
    }

    function cargarProducto()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $usuario = $_POST['usuario'];
        $producto = new Producto($id,$nombre,$precio,$usuario);
        $origen = $_FILES["imagen"]["tmp_name"];
        $uploadedFileOriginalName = $_FILES["imagen"]["name"];
        $ext = pathinfo($uploadedFileOriginalName, PATHINFO_EXTENSION);
        $fileDestination = "data/".$producto->id.".".$ext;
        move_uploaded_file($origen, $fileDestination);
        $producto->imagen = $fileDestination;

        $fileReference = fopen("data/productos.txt","a");
        fwrite($fileReference,$producto->toCSV());
        fclose($fileReference);
        echo "producto cargado";
    }

    function modificarProducto()
    {
        $idPost = $_POST['id'];
        $nombrePost = $_POST['nombre'];
        $precioPost = $_POST['precio'];
        $usuarioPost = $_POST['usuario'];

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

        foreach ($productos as $producto) {
            if ($producto->id  == $idPost) {
                $producto->nombre = $nombrePost;
                $producto->precio = $precioPost;
                $producto->usuario = $usuarioPost;

                $origen = $_FILES["imagen"]["tmp_name"];
                $uploadedFileOriginalName = $_FILES["imagen"]["name"];
                $ext = pathinfo($uploadedFileOriginalName, PATHINFO_EXTENSION);
                $fileDestination = "data/".$producto->id.".".$ext;  
                if (file_exists($fileDestination)) 
                    copy($fileDestination,"backUpFotos/".$producto->id."_".date("dmyhis").".".$ext);
                move_uploaded_file($origen, $fileDestination);
                break;
            }
        }
    }
?>