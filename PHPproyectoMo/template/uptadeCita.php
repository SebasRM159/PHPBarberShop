<?php
require_once '../php/db.php';

$con = Database::connect();


$id = $_GET['id'];

$sql = "SELECT * FROM cita WHERE id='$id' ";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../styles/edit_forms.css" rel="stylesheet">
        <title>Editar Citas</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="editCitas.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <label for="cliente">Nombre del Cliente</label>
                <input type="text" name="cliente" placeholder="Nombre" value="<?= $row['cliente']?>">
                <label for="fecha">Fecha de la cita</label>
                <input type="text" name="fecha" placeholder="Apellidos" value="<?= $row['fecha']?>">
                <label for="valor">Valor de la cita</label>
                <input type="text" name="valor" placeholder="Username" value="<?= $row['valor']?>">
                <label for="FK_id_agenda">ID de la Agenda</label>
                <input type="text" name="FK_id_agenda" placeholder="Password" value="<?= $row['FK_id_agenda']?>">

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>