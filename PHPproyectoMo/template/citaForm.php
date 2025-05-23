<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
$message = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-button'])) {
    require_once __DIR__ .'/../php/cita.php';
    require_once __DIR__ . '/../php/agenda.php';

    try{
        $fecha = $_POST['fechaC'] ?? '';
        $cliente = $_POST['nombre'] ?? '';
        $hora = $_POST['horaC'] ?? '';
        $valor = $_POST['valor'] ?? '';

        if (empty($fecha) || empty($cliente) || empty($hora) || empty($valor)) {
            throw new Exception("Todos los campos son obligatorios");
        }

        $usuario_id = $_SESSION['user']['id'];
        $db = Database::connect();
        $sql = "SELECT id, diainicio, diafinal FROM agenda WHERE FK_id_usuario = $usuario_id";
        $result = mysqli_query($db, $sql);

        $agenda_id = null;
        while($row = $result->fetch_assoc()) {
            if($fecha >= $row['diainicio'] && $fecha <= $row['diafinal']) {
                $agenda_id = $row['id'];
                break;
            }
        }

        if(!$agenda_id) {
            throw new Exception("No hay agendas disponibles para la fecha seleccionada");
        }  

        $cita = new cita();
        $cita->setFecha($fecha);
        $cita->setCliente($cliente);
        $cita->setHora($hora);
        $cita->setValor($valor);
        $cita->setFK_id_agenda($agenda_id);

        if($cita->save()) {
            $message = 'Cita registrada correctamente.';
            header('Location: ../index.php');
        } else {
            throw new Exception("Error al registrar la cita.");
        }
    } catch (Exception $e) {
        $message = 'Error al registrar la cita: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/stylesheet.css">
    <title>David Rodríguez: Barbería - Citar</title>
</head>
<body background="../images/backgroundBarberia.png">
    <div id="register-form"class="container" style="display: block;">
        <div class="container-form">
            <?php
            if (!empty($message)): ?>
                <div class="message <?php echo strpos($message, 'Error') === false ? 'success' : 'error'; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            <div class="FormularioA">
                <section>
                    <h1 class="titulo">Citacion</h1>
                    <div class="container-form">
                        <form id="citas" method="POST">
                            <label for="text">Nombre Completo del Cliente</label>
                            <input type="text" id="nombre" name="nombre" required>
                            <br>
                            <label for="date">Fecha de la cita</label>
                            <input type="date" id="fechaC" name="fechaC" required>
                            <br>
                            <label for="time">Hora de la cita</label>
                            <input type="time" id="horaC" name="horaC" required>
                            <br>
                            <label for="text">Valor del corte</label>
                            <input type="number" id="valor" name="valor" required>
                            <!-- <br>
                            <label for="valor">Tipo</label>
                            <select id="tipo" name="tipo" required>
                                <option value="">Seleccione una opción</option>
                                <option value="corto">Corto</option>
                                <option value="medio">Medio</option>
                                <option value="largo">Largo</option>
                                <option value="corto/barba">Corto/Barba</option>
                                <option value="medio/barba">Medio/Barba</option>
                                <option value="largo/barba">Largo/Barba</option>
                            </select>
                            <br> -->
                            <input id="submit-button" type="submit" value="Agendar cita" href="../index.php" name="submit-button">
                        </form>
                    </div>
                </section>
                <img src="https://i.pinimg.com/736x/30/e2/18/30e218881e252ec96c2d85190529bca0.jpg" alt="Banner" class="banner"/>
            </div>
        </div>
    </div>
</body>
</html>