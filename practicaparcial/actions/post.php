<?php
    require_once "./class/proveedor.php";
    require_once "./class/pedido.php";


    function doPost(){
        switch ($_POST['caso']) {
            case 'cargarProveedor':
                cargarProveedor();
                break;
            case 'hacerPedido':
                hacerPedido();
                break;
            
            default:
                echo "metodo invalido";
                break;
        }
    }

    
    function cargarProveedor()
    {
    
        $proveedor = new Proveedor($_POST['id'],$_POST['name'],$_POST['email']);
        $origen = $_FILES["foto"]["tmp_name"];
        $uploadedFileOriginalName = $_FILES["foto"]["name"];
        $ext = pathinfo($uploadedFileOriginalName, PATHINFO_EXTENSION);
        $fileDestination = "data/".$proveedor->nombre."-".$proveedor->id.".".$ext;
        move_uploaded_file($origen, $fileDestination);
        $proveedor->foto = $fileDestination;

        $fileReference = fopen("data/proveedores.txt","a");
        fwrite($fileReference,$proveedor->toCSV());
        fclose($fileReference);
        echo "proveedor cargado";
    }

    function hacerPedido()
    {
        
       $pedido = new Pedido($_POST['producto'],$_POST['cantidad'],$_POST['idProducto']) 
    }
    