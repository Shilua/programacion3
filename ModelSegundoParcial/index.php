<?php
    require_once 'vendor/autoload.php';
    require_once 'clases/usuarioApi.php';

    Use \Psr\Http\Message\ResponseInterface as Response;
    Use \Psr\Http\Message\ServerRequestInterface as Request;
    
    
    $config['displayErrorsDetails']  = true;
    $config['addContentLengthHeader']  = true;
    
    $app = new \Slim\App(["settings" => $config]);
    
    $app->group('/', function (){
        $this->get('get[/]', UsuarioApi::class . ':Get');
    });
    
    $app->run();