<?php
require_once '../php/db.php';

$con = Database::connect();

$id=$_GET["id"];

$sql="DELETE FROM agenda WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: agendaForm.php");
}else{

}

?>