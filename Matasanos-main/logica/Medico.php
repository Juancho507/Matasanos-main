<?php
require ("logica/Persona.php");
require_once ("persistencia/Conexion.php");
require_once ("persistencia/MedicoDAO.php");

class Medico extends Persona{
    private ?Especialidad $especialidad_id;
    
    
    public function getEspecialidad_id(){
        return $this -> especialidad_id;
    }
    
    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $especialidad_id = null) {
        parent::__construct($id, $nombre, $apellido, $correo, $clave );
        $this -> especialidad_id = $especialidad_id;
    }
    
    public function consultarPorEspecialidad($idEspecialidad){
        $conexion = new Conexion();
        $medicoDAO = new MedicoDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($medicoDAO -> consultarPorEspecialidad($idEspecialidad));
        $medicos = array();
        while(($datos = $conexion -> registro()) != null){
            $especialidad = new Especialidad($datos[5]);
            $medico = new Medico($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $especialidad);
            array_push($medicos, $medico);
        }
       $conexion -> cerrar();
        return $medicos;
    }
}
?>