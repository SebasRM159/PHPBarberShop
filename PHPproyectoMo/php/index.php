<?php

require_once 'db.php';
$usuario = new usuario();
$usuario->setNombre('');
$usuario->setApellidos('');
$usuario->setEmail('');
$usuario->setPassword('');
$usuario->setFecha('');
$save=$usuario->save();
$login=$usuario->Login();
while($ver= $login->fetch_object()){
    echo ''.$ver->nombre.'>>>'.$ver->apellidos;
}
$update=$usuario->update($id);

?>;
