<?php
$message = '';



if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-button'])) {
    require_once '../php/cita.php';
    try{
        $fecha = $_POST['fechaC'] ?? '';
        $cliente = $_POST['nombre'] ?? '';
        $hora = $_POST['horaC'] ?? '';
        $valor = $_POST['valor'] ?? '';

        if (empty($fecha) || empty($cliente) || empty($hora) || empty($valor)) {
            throw new Exception("Todos los campos son obligatorios");
        }

        $usuario = new usuario();
        $usuario->setNombre($fecha);
        $usuario->setApellidos($cliente);
        $usuario->setEmail($hora);
        $usuario->setPassword($valor);

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

<div class="FormularioA">
    <section>
        <h1 class="titulo">Citacion</h1>
        <div class="container-form">
            <form id="citas" method="post">
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
                <input type="text" id="tipoC" name="desc" required>
                <br>
                <input id="submit-button" type="submit" value="Agendar cita" href="index.html">
            </form>
        </div>
    </section>
    <img src="https://i.pinimg.com/736x/30/e2/18/30e218881e252ec96c2d85190529bca0.jpg" alt="Banner" class="banner"/>
</div>