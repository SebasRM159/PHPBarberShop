<?php
require_once 'db.php';
class usuario{
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
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

    //funcion save
    public function save() {
        $sql = "INSERT INTO usuario(
        `nombre`,
        `apellidos`,
        `email`,
        `password`
        ) VALUES(
            '{$this->getNombre()}',
            '{$this->getApellidos()}',
            '{$this->getEmail()}',
            '{$this->getPassword()}'
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
        $sql = "SELECT * FROM usuario WHERE email = '$email' AND password = '$password'";
        $login = $this->db->query($sql);
        return $login;
    }

    //funcion update
    public function update($id) {
        $sql = "UPDATE usuario SET 
                nombre = '{$this->getNombre()}',
                apellidos = '{$this->getApellidos()}',
                email = '{$this->getEmail()}',
                password = '{$this->getPassword()}'
                WHERE id = $id";
                
        $update = $this->db->query($sql);   
        return $update;
    }
}

?>;