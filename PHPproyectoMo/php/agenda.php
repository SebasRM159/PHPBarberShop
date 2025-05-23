<?php
require_once 'db.php';

class Agenda {
    private $id;
    private $horaE;
    private $horaS;
    private $diaInicio;
    private $diaFin;
    private $FK_id_usuario;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    //------------------ GETTERS ------------------//
    public function getId() {
        return $this->id;
    }

    public function getHoraE() {
        return $this->horaE;
    }

    public function getHoraS() {
        return $this->horaS;
    }
    public function getDiaInicio() {
        return $this->diaInicio;
    }
    public function getDiaFin() {
        return $this->diaFin;
    }
    public function getFK_id_usuario() {
        return $this->FK_id_usuario;
    }


    //------------------ SETTERS ------------------//
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setHoraE($horaE) {
        $this->horaE = $horaE;
    }

    public function setHoraS($horaS): void {
        $this->horaS = $horaS;
    }

    public function setDiaInicio($diaInicio): void {
        $this->diaInicio = $diaInicio;
    }
    public function setDiaFin($diaFin): void {
        $this->diaFin = $diaFin;
    }
    public function setFK_id_usuario($FK_id_usuario): void {
        $this->FK_id_usuario = $FK_id_usuario;
    }


    public function save() {
        $sql = "INSERT INTO agenda (horaentrada, horasalida, diainicio, diafinal, FK_id_usuario) VALUES (
            '{$this->getHoraE()}',
            '{$this->getHoraS()}',
            '{$this->getDiaInicio()}',
            '{$this->getDiaFin()}',
            '{$this->getFK_id_usuario()}'
        )";
        
        $save = $this->db->query($sql);
        return $save;
    }

    
    public function update() {
        $sql = "UPDATE agenda SET 
                horaS = '{$this->getHoraS()}',
                horaE = {$this->getHoraE()},
                diaInicio = '{$this->getDiaInicio()}',
                diaFin = '{$this->getDiaFin()}',
                FK_id_usuario = '{$this->getFK_id_usuario()}'
                WHERE id = {$this->getId()}";
                
        $update = $this->db->query($sql);
        return $update;
    }
    public function getCitas() {
    $sql = "SELECT * FROM cita WHERE FK_id_agenda = {$this->getId()}";
    $result = $this->db->query($sql);
    $citas = [];
    while($row = $result->fetch_assoc()) {
        $citas[] = $row;
    }
    return $citas;
}
}
?>;