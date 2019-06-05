<?php
require 'vendor/autoload.php';

Use \Psr\Http\Message\ResponseInterface as Response;
Use \Psr\Http\Message\ServerRequestInterface as Request;


$config['displayErrorsDetails']  = true;
$config['addContentLengthHeader']  = true;


$app = new \Slim\App(["settings" => $config]);

$app->get('/[{id}]', function ( Request $req, Response $res, $args) {
    $id = $args["id"];
    return $res->write( "Get tomo el parametro id: $id");
});

$app->post('/[{id}]', function ( Request $req, Response $res, $args) {
    $id = $args['id'];
    return $res->write( "Post tomo el parametro id: $id");
});

$app->run();

