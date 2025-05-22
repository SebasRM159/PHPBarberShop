<?php
require_once '../php/db.php';

$con = Database::connect();


$id = $_POST['id'];
$cliente = $_POST['cliente'];
$fecha = $_POST['fecha'];
$valor = $_POST['valor'];
$FK_id_agenda = $_POST['FK_id_agenda'];


$sql = "UPDATE cita SET cliente='$cliente', fecha='$fecha', valor='$valor', FK_id_agenda='$FK_id_agenda' WHERE id='$id'  ";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: Vista.php");
}else{

}


?>