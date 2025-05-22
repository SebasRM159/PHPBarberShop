<?php
require_once '../php/db.php';

$con = Database::connect();

$sql = "SELECT * FROM cita";
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
    <main class="vista-main">
        <div  class="tabla-contenedor">
            <h1 class="titulo"> Citas Registradas </h1>
            <table  class="tabla-citas">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Nombre del Cliente </th>
                        <th> Fecha de la cita </th>
                        <th> Valor de la cita</th>
                        <th> ID de la Agenda</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>    
                <tbody>
                    <?php   while ($row = mysqli_fetch_array($query)): ?>
                    <tr>

                        <th> <?= $row['id'] ?> </th>
                        <th> <?= $row['cliente'] ?> </th>
                        <th> <?= $row['fecha'] ?> </th>
                        <th> <?= $row['valor'] ?> </th>
                        <th> <?= $row['FK_id_agenda'] ?> </th>

                        <th><a class="btn-editar" href="uptade.php?id=<?= $row['id'] ?>" >Editar</a></th>
                        <th><a class="btn-editar" href="delete.php?id=<?= $row['id'] ?>">Eliminar</a> </th>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>


        </div>
    </main>
    
</body>
</html>