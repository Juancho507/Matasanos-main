<?php

class MedicoDAO {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $especialidad_id;
    
    
    public function __construct($id = 0, $nombre = "", $apellido = "", $correo = "", $clave = "", $especialidad_id=0){
        
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> especialidad_id = $especialidad_id;
    }
    
    public function consultarPorEspecialidad($idEspecialidad) {
        return "select idMedico, nombre, apellido, correo, clave, Especialidad_id
                from Medico
                where Especialidad_id = $idEspecialidad
                order by apellido asc";
    }
}


?>