<?php
require_once '../php/db.php';

$con = Database::connect();

$sql = "SELECT * FROM agenda";
$query = mysqli_query($con, $sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista</title>
    <link rel="stylesheet" href="../styles/vista.css">
</head>
<body>
    <div class="FormularioA">
        <section>
            <h1 class="titulo">Agenda Semanal</h1>
            <div class="container-form">
            <form action="insertAgenda.php" method="POST">
                <h2 class="titulo">Ingrese la Hora de Entrada</h2>
                <input type="time" name="horaentrada" placeholder="Hora Entrada">
                <h2 class="titulo">Ingrese la Hora de Salida</h2>
                <input type="time" name="horasalida" placeholder="Hora Salida">
                <h2 class="titulo">Ingrese el Dia de Inicio</h2>
                <input type="date" name="diainicio" placeholder="Dia Inicio">
                <h2 class="titulo">Ingrese el Dia final</h2>
                <input type="date" name="diafinal" placeholder="Dia Final">
                <h2 class="titulo">Inserte el Id del usuario</h2>
                <input type="number" name="idusuario" placeholder="Id Usuario">
                <br>
                <input type="submit" value="Agregar">
            </form>
            </div>
        </section>
    </div>
</body>
</html>