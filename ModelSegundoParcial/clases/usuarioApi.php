<?php
    Use \Psr\Http\Message\ResponseInterface as Response;
    Use \Psr\Http\Message\ServerRequestInterface as Request;
    
    class UsuarioApi
    {
        public function Get(Request $request,Response $response, $args) {
           return $response->write('get de clase');
        }

        public function FunctionName()
        {
            
        }
    }
    