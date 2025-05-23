<?php
require_once '../php/db.php';

$con = Database::connect();


$id = $_GET['id'];

$sql = "SELECT * FROM agenda WHERE id='$id' ";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Editar agenda</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="editarAgenda.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <input type="time" name="horaentrada" placeholder="Nombre" value="<?= $row['horaentrada']?>">
                <input type="time" name="horasalida" placeholder="Apellidos" value="<?= $row['horasalida']?>">
                <input type="date" name="diainicio" placeholder="Username" value="<?= $row['diainicio']?>">
                <input type="date" name="diafinal" placeholder="Password" value="<?= $row['diafinal']?>">
                <input type="number" name="idusuario" placeholder="Password" value="<?= $row['FK_id_usuario']?>">

                <input type="submit" value="Actualizar Informacion"> 
            </form>
        </div>
    </body>
</html>