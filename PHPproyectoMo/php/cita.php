<?php
require_once 'db.php';



class Cita {
    private $id;
    private $fecha;
    private $cliente;
    private $hora;
    private $valor;
    private $db;

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

    //------------------ SETTERS ------------------//
    public function setId($id) {
        $this->id = $this->db->$id;
    }

    public function setFecha($fecha) {
        $this->fecha = $this->db->$fecha;
    }

    public function setCliente($cliente) {
        $this->cliente = $this->db->$cliente;
    }

    public function setHora($hora) {
        $this->hora = $this->db->$hora;
    }

    public function setValor($valor) {
        $this->valor =  $this->db->$valor; // Asegurar que sea decimal
    }


    public function save() {
        $sql = "INSERT INTO citas (cliente, hora, valor, fecha) VALUES (
            '{$this->getCliente()}',
            '{$this->getHora()}',
            '{$this->getValor()}',
            '{$this->getFecha()}'
        )";
        
        $save = $this->db->query($sql);
        $result = false;
        if($save)
        $result=true; 

        return $result;
    }


    public function update() {
        $sql = "UPDATE citas SET 
                cliente = '{$this->getCliente()}',
                hora = '{$this->getHora()}',
                valor = {$this->getValor()},
                fecha = '{$this->getFecha()}'
                WHERE id = {$this->getId()}";
                
        $update = $this->db->query($sql);
        return $update;
    }

    public function cancel() {
        $sql = "DELETE FROM cita WHERE id = {$this->getId()}";
        return $this->db->query($sql);
    }
}