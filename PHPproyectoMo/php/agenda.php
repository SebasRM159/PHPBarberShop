<?php
class Agenda {
    private $fecha;
    private $disponibilidad;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // GETTERS
    public function getFecha() {
        return $this->fecha;
    }

    public function getDisponibilidad() {
        return $this->disponibilidad;
    }

    // SETTERS

    public function setFecha($fecha) {
        $this->hora = $this->db->$hora;

    public function setDisponibilidad($disponibilidad) {
        $this->disponibilidad = $disponibilidad ? 1 : 0; // Convertir a 1 o 0 para la BD
        return $this;
    }


    public function save() {
        $sql = "INSERT INTO agendas (fecha, disponibilidad) VALUES (
            '{$this->getFecha()}',
            {$this->getDisponibilidad()}
        )";
        
        $save = $this->db->query($sql);
        return $save;
    }

    
    public function update() {
        $sql = "UPDATE agendas SET 
                fecha = '{$this->getFecha()}',
                disponibilidad = {$this->getDisponibilidad()}
                WHERE id = {$this->getId()}";
                
        $update = $this->db->query($sql);
        return $update;
    }
}
?>