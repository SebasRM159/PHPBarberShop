<?php
require_once '../php/db.php';

$con = Database::connect();

$id = null;
$horaENtrada = $_POST['horaentrada'];
$horaSalida = $_POST['horasalida'];
$diaInicio = $_POST['diainicio'];
$diaFinal = $_POST['diafinal'];
$FK_id_usuario = $_POST['idusuario'];


$sql = "INSERT INTO agenda (horaentrada, horasalida, diainicio, diafinal, FK_id_usuario) VALUES ('$horaENtrada', '$horaSalida', '$diaInicio', '$diaFinal', '$FK_id_usuario')";

$query = mysqli_query($con, $sql);

if ($query) {
    header('Location: agendaForm.php');
} else {
    echo "Error al insertar la agenda";
    echo mysqli_error($con);
}

?>