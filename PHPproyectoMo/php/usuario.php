<?php
require_once 'db.php';
class usuario{
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $fecha;
    private $db;

    public function __construct(){
        $this->db=Database::connect();
    }

//------------------ GETTERS ------------------//

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFecha() {
        return $this->fecha;
    }


    //------------------ SETTERS ------------------//

     public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    //funcion save
    public function save() {
        $sql = "INSERT INTO usuarios VALUES(
            NULL,
            '{$this->getNombre()}',
            '{$this->getApellidos()}',
            '{$this->getEmail()}',
            '{$this->getPassword()}',
            '{$this->getFecha()}'
        )";
        
        $save = $this->db->query($sql);
        $result = false;
        if($save)
        $result=true; 

        return $result;
    }

    //funcion login
    public function login() {
        $email = $this->email;
        $password = $this->password;
        
        // Comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
        $login = $this->db->query($sql);
        return $login;
    }

    //funcion update
     public function update($id) {
        $sql = "UPDATE usuarios SET 
                nombre = '{$this->getNombre()}',
                apellidos = '{$this->getApellidos()}',
                email = '{$this->getEmail()}',
                password = '{$this->getPassword()}',
                fecha = '{$this->getFecha()}'
                WHERE id = $id";
                
        $update = $this->db->query($sql);   
        return $update;
    }
}

?>;