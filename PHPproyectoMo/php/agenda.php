<?php
require_once 'db.php';

class Agenda {
    private $id;
    private $horaE;
    private $horaS;
    private $semana;
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
        public function getSemana() {
        return $this->semana;
    }


    //------------------ SETTERS ------------------//
    public function setId($id) {
        $this->id = $this->db->$id;
    }
    
    public function setHoraE($horaE) {
        $this->horaE = $this->db->$horaE;
    }

    public function setHoraS($horaS): void {
        $this->horaS = $this->db->$horaS;
    }

    public function setSemana($semana): void {
        $this->semana = $this->db->$semana;
    }


    public function save() {
        $sql = "INSERT INTO agendas (fecha, disponibilidad) VALUES (
            '{$this->getHoraE()}',
            {$this->getHoraS()},

        )";
        
        $save = $this->db->query($sql);
        return $save;
    }

    
    public function update() {
        $sql = "UPDATE agendas SET 
                horaS = '{$this->getHoraS()}',
                horaE = {$this->getHoraE()},
                semana = {$this->getSemana()}
                WHERE id = {$this->getId()}";
                
        $update = $this->db->query($sql);
        return $update;
    }
}
?>;