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




if (isset($_POST['horaEntrada']) && isset($_POST['horaSalida'])) {
    // Convertir a objetos DateTime
    $fechaEntrada = new DateTime($_POST['horaEntrada']);
    $fechaSalida = new DateTime($_POST['horaSalida']);

    // Comparar
    if ($fechaEntrada > $fechaSalida) {
        echo "La Fecha 1 es posterior a la Fecha 2.";
    } elseif ($fechaEntrada < $fechaSalida) {
        echo "La Fecha 1 es anterior a la Fecha 2.";
    } else {
        echo "Las fechas son iguales.";
    }
}

?>;
