<?php

    require_once "materiaDao.php";
    require_once "materia.php";
    require_once "materiaAlumnoDao.php";
    require_once "materiaAlumno.php";
    require_once "usuarioDao.php";
    require_once "usuario.php";

    use \Firebase\JWT\JWT;
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    class materiaApi
    {
        public function guardarMateria( Request $req, Response $res, $args)
        {
            try
            {
                $dataReceived       = $req->getParsedBody();

                if(sizeof($dataReceived) < 2){
                    return $res->write("No se recibieron datos. O los datos son insuficientes.");
                }
                $decoding = Middleware::validarToken($req,$res);
                $utipo = $decoding->data;
                if($utipo == "admin"){
                    
                    $materia = new Materia($dataReceived["nombre"], $dataReceived["cuatrimestre"],$dataReceived["cupos"]);
                    $valor = MateriaDao::InsertarMateria($materia);
                    if($valor)
                    return $res->write("Materia Guardada con Exito.");
                    else
                    return $res->write("Materia no ha podido guardarse.");

                }else {
                    return $res->write("Usted no es admin.");

                }
                
            } catch( exception $e ) {
                print "Error!!!<br/>" . $e->getMessage();
                die();
            }
        }

        public static function InscribirAlumno()
        {
            $decoding = Middleware::validarToken($req,$res);
            $utipo = $decoding->data;

            if($utipo == "admin"){
                $dataReceived       = $req->getParsedBody();
                $materia = $args['id'];
                $usuario = $dataReceived['usuarioLegajo'];
                
                $usuariodb = UsuarioDAO::TraerUsuario($usuario);
                $materidb = MateriaDao::TraerMateria($materia);
                $materiaAInscribir = $materiadb[0];
                $usuarioAInscribir = $usuariodb;
                if($materiaAInscribir->cupo != 0 && $usuarioAInscribir->tipo == "alumno"){
                    $materiaAlumno = new MateriaAlumno($materiaAInscribir->id, $usuarioAInscribir->id);
                    $control = AlumnoMateriaDao::insertarMAlumnoMateria($materiaAlumno);

                }
            }            
        }
    }
    