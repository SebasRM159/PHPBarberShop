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
    <link rel="stylesheet" href="../styles/vista.css">
    <title>Agendas</title>
</head>
<body>
    <main class="vista-main">
            <div  class="tabla-contenedor">
                <h1 class="titulo"> Agenda </h1>
                <table  class="tabla-citas">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Hora Entrada </th>
                            <th> Hora Salida </th>
                            <th> Dia Inicio</th>
                            <th> Dia final</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php   while ($row = mysqli_fetch_array($query)): ?>
                        <tr>

                            <th> <?= $row['id'] ?> </th>
                            <th> <?= $row['horaentrada'] ?> </th>
                            <th> <?= $row['horasalida'] ?> </th>
                            <th> <?= $row['diainicio'] ?> </th>
                            <th> <?= $row['diafinal'] ?> </th>

                            <th><a class="btn-editar" href="updateAgenda.php?id=<?= $row['id'] ?>" >Editar</a></th>
                            <th><a class="btn-eliminar" href="deleteAgenda.php?id=<?= $row['id'] ?>">Eliminar</a> </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <a class="volver"href="../index.php">Volver</a>
            </div>
        </main>
</body>
</html>