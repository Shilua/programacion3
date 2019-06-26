<?php

    include_once 'classes\accesodatos.php';

    class AlumnoMateriaDao
    {
        public $id;
        public $alumnoId;
        public $materiaId;

        public  static function insertarMAlumnoMateria($alumnoMateria)
        {
            try{
                $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
    
                $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO materia (id,alumno_id, materia_id)"
                                                                . "VALUES(null,
                                                                    :alumno_id, :materia_id)");
                $consulta->bindValue(':alumno_id', $alumnoMateria->alumnoId, PDO::PARAM_INT);
                $consulta->bindValue(':materia_id', $materia->materiaId, PDO::PARAM_INT);
                $salida = $consulta->execute();
                return $salida;
                }
                catch( exception $ex ){
                    return "FAILURE";
                }
        }
    }
    