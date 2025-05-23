<?php
require_once '../php/db.php';

$con = Database::connect();

$id = $_POST['id'];
$horaENtrada = $_POST['horaentrada'];
$horaSalida = $_POST['horasalida'];
$diaInicio = $_POST['diainicio'];
$diaFinal = $_POST['diafinal'];
$FK_id_usuario = $_POST['idusuario'];


$sql = "UPDATE agenda SET horaentrada='$horaENtrada', horasalida='$horaSalida', diainicio='$diaInicio', diafinal='$diaFinal', FK_id_usuario='$FK_id_usuario' WHERE id='$id'  ";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: vistaAgenda.php");
}else{

}


?>
