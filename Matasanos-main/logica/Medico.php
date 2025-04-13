<?php
require ("logica/Persona.php");
require_once ("persistencia/Conexion.php");
require_once ("persistencia/MedicoDAO.php");

class Medico extends Persona{
    private $id; 
    private $especialidad_id;
    
    public function getId(){
        return $this -> id;
    }
    
    public function getEspecialidad_id(){
        return $this -> especialidad_id;
    }
    
    public function __construct($id=0, $nombre="", $apellido="", $especialidad_id=0) {
        parent::__construct($nombre, $apellido);
        $this -> id = $id;
        $this -> especialidad_id = $especialidad_id;
    }
    
    public function consultarPorEspecialidad($idEspecialidad){
        $conexion = new Conexion();
        $medicoDAO = new MedicoDAO();
        $conexion -> abrir();
        $conexion -> ejecutar($medicoDAO -> consultarPorEspecialidad($idEspecialidad));
        $medicos = array();
        while(($datos = $conexion -> registro()) != null){
            $medico = new Medico($datos[0], $datos[1], $datos[2], $datos[3]);
            array_push($medicos, $medico);
        }
        $conexion -> cerrar();
        return $medicos;
    }
}
?>