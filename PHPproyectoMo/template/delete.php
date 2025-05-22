<?php
require_once '../php/db.php';

$con = Database::connect();

$id=$_GET["id"];

$sql="DELETE FROM cita WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: Vista.php");
}else{

}

?>