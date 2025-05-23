<?php
require_once 'db.php';



class Cita {
    private $id;
    private $fecha;
    private $cliente;
    private $hora;
    private $valor;
    private $db;
    private $FK_id_agenda;

    public function __construct() {
        $this->db = Database::connect();
    }

    //------------------ GETTERS ------------------//
    public function getId() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getValor() {
        return $this->valor;
    }
    public function getFK_id_agenda() {
        return $this->FK_id_agenda;
    }

    //------------------ SETTERS ------------------//
    public function setId($id) {
        $this->id = $id;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }

    public function setValor($valor) {
        $this->valor =  $valor; // Asegurar que sea decimal
    }
    public function setFK_id_agenda($FK_id_agenda) {
        $this->FK_id_agenda = $FK_id_agenda;
    }


    public function save() {
        $sql = "INSERT INTO cita (cliente, hora, valor, fecha, FK_id_agenda) VALUES (
            '{$this->getCliente()}',
            '{$this->getHora()}',
            '{$this->getValor()}',
            '{$this->getFecha()}',
            '{$this->getFK_id_agenda()}'
        )";
        
        $save = $this->db->query($sql);
        $result = false;
        if($save)
        $result=true; 

        return $result;
    }


    public function update() {
        $sql = "UPDATE cita SET 
                cliente = '{$this->getCliente()}',
                hora = '{$this->getHora()}',
                valor = '{$this->getValor()}',
                fecha = '{$this->getFecha()}',
                FK_id_agenda = '{$this->getFK_id_agenda()}'
                WHERE id = {$this->getId()}";
                
        $update = $this->db->query($sql);
        return $update;
    }

    public function cancel() {
        $sql = "DELETE FROM cita WHERE id = {$this->getId()}";
        return $this->db->query($sql);
    }
}