<?php
$message = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-button'])) {
    require_once '../php/usuario.php';
    try{
        $nombre = $_POST['name'] ?? '';
        $apellido = $_POST['lastName'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($nombre) || empty($apellido) || empty($email) || empty($password)) {
            throw new Exception("Todos los campos son obligatorios");
        }

        $usuario = new usuario();

        $usuario->setNombre($nombre);
        $usuario->setApellidos($apellido);
        $usuario->setEmail($email);
        $usuario->setPassword($password);

        if($usuario->save()) {
            $message = 'Usuario registrado correctamente.';
            header('Location: ../index.php');
        } else {
            throw new Exception("Error al registrar el usuario.");
        }
    } catch (Exception $e) {
        $message = 'Error al registrar el usuario: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login_style.css">
    <title>David Rodríguez: Barbería - Registro</title>
</head>
<body background="../images/backgroundBarberia.png">
    <div id="register-form"class="container" style="display: block;">
        <h1>Registrarse</h1>
        <div class="container-form">
            <?php
            if (!empty($message)): ?>
                <div class="message <?php echo strpos($message, 'Error') === false ? 'success' : 'error'; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>
            <form action="login.php" method="POST">
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name" required value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                <br>
                <label for="lastName">Apellido</label>
                <input type="text" id="lastName" name="lastName" required value="<?php echo isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : ''; ?>">
                <br>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <br>
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
                <br>
                <input id="submit-button" type="submit" name="submit-button" value="Registrarse">
                <a class="volver"href="../index.php">Volver</a>
            </form>
        </div>
    </div>
</body>
</html>
