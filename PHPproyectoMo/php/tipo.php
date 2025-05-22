<?php
require_once 'db.php';

class Tipo {
    private $id;
    private $nombre;
    private $descripcion;
    private $costo;
    private $duracion;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

//------------------ GETTERS ------------------//

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    //------------------ SETTERS ------------------//

    public function setNombre($nombre) {
        $this->nombre = $this->db->$nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $this->db->$descripcion;
    }

    public function setCosto($costo) {
        $this->costo = $this->db->$costo; 
    }

    public function setDuracion($duracion) {
        $this->duracion = $this->db->$duracion; // Asegurar que sea entero
    }

    public function save() {
        $sql ="INSERT INTO tipo (nombre, descripcion, costo, duracion) VALUES (
            '{$this->getNombre()}',
            '{$this->getDescripcion()}',
            {$this->getCosto()},
            {$this->getDuracion()}
        )";
        
        $save = $this->db->query($sql);
        $result = false;
        if($save)
         $result=true; 

        return $result;
    }


    public function update() {                
        $sql ="UPDATE tipo SET
            nombre = '{$this->getNombre()}',
            descripcion = '{$this->getDescripcion()}',
            cost = {$this->getCosto()},
            duracion = {$this->getDuracion()}";

        $update = $this->db->query($sql);
        return $update;
    }

}
