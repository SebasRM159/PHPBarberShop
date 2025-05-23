<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

$message = '';
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-button'])) {
    require_once __DIR__ . '/../php/agenda.php';
    try{
        $horaentrada = $_POST['horaentrada'] ?? '';
        $horasalida = $_POST['horasalida'] ?? '';
        $diainicio = $_POST['diainicio'] ?? '';
        $diafinal = $_POST['diafinal'] ?? '';
        if (empty($horaentrada) || empty($horasalida) || empty($diainicio) || empty($diafinal)) {
            throw new Exception("Todos los campos son obligatorios");
        }

        $usuario_id = $_SESSION['user']['id'];
        $db = Database::connect();

        $agenda = new agenda();
        $agenda->setHoraE($horaentrada);
        $agenda->setHoraS($horasalida);
        $agenda->setDiaInicio($diainicio);
        $agenda->setDiaFin($diafinal);
        $agenda->setFK_id_usuario($usuario_id);

        if($agenda->save()) {
            $message = 'Agenda registrada correctamente.';
            header('Location: ./template/vistaAgenda.php');
        } else {
            throw new Exception("Error al registrar la agenda.");
        }
    } catch (Exception $e) {
        $message = 'Error al registrar la agenda: ' . $e->getMessage();
    }
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista</title>
    <link rel="stylesheet" href="../styles/stylesheet.css">
</head>
<body>
    <div class="FormularioA">
        <section>
            <h1 class="titulo">Agenda Semanal</h1>
            <div class="container-form">
            <form id="agenda" method="POST">
                <h2 class="titulo">Ingrese la Hora de Entrada</h2>
                <input type="time" name="horaentrada" placeholder="Hora Entrada" required>
                <h2 class="titulo">Ingrese la Hora de Salida</h2>
                <input type="time" name="horasalida" placeholder="Hora Salida" required>
                <h2 class="titulo">Ingrese el Dia de Inicio</h2>
                <input type="date" name="diainicio" placeholder="Dia Inicio" required>
                <h2 class="titulo">Ingrese el Dia final</h2>
                <input type="date" name="diafinal" placeholder="Dia Final" required>
                <input id="submit-button" type="submit" value="Agregar" name="submit-button">
            </form>
            </div>
        </section>
    </div>
</body>
</html>