<?php

class Persona{
    private $nombre;
    private $apellido; 
    
    public function getNombre(){
        return $this -> nombre; 
    }
    
    public function getApellido(){
        return $this -> apellido;
    }
    
    public function __construct($nombre="", $apellido=""){
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
    }
}
?>