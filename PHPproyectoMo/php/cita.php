<?php
require_once 'db.php';

class Cita {
    private $cliente;
    private $estado;
    private $hora;
    private $valor;
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // GETTERS

    public function getCliente() {
        return $this->cliente;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getValor() {
        return $this->valor;
    }

    // SETTERS

    public function setCliente($cliente) {
        $this->cliente = $this->db->$cliente;
    }

    public function setEstado($estado) {
        $this->estado = $estado ? 1 : 0; // Convertir a 1 o 0 para la BD
    }

    public function setHora($hora) {
        $this->hora = $this->db->$hora;
    }

    public function setValor($valor) {
        $this->valor =  $this->db->$valor; // Asegurar que sea decimal
    }


    public function save() {
        $sql = "INSERT INTO citas (cliente, estado, hora, valor) VALUES (
            '{$this->getCliente()}',
            {$this->getEstado()},
            '{$this->getHora()}',
            {$this->getValor()}
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
                estado = {$this->getEstado()},
                hora = '{$this->getHora()}',
                valor = {$this->getValor()}
                WHERE id = {$this->getId()}";
                
        $update = $this->db->query($sql);
        return $update;
    }

    public function cancel() {
        $sql = "UPDATE citas SET estado = 0 WHERE id = {$this->getId()}";
        return $this->db->query($sql);
    }
}