<?php
$message = '';

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit-button'])) {
    require_once '../php/usuario.php';
    try{
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            throw new Exception("Todos los campos son obligatorios");
        }
        $usuario = new usuario();
        $usuario->setEmail($email);
        $usuario->setPassword($password);

        $login_result = $usuario->login();
        if($login_result && $login_result->num_rows > 0) {
            session_start();
            $_SESSION['user'] = $usuario->getEmail();
            header('Location: ../index.php');
        } else {
            throw new Exception("Error al iniciar sesión.");
        }
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login_style.css">
    <title>David Rodríguez: Barbería - Iniciar sesión</title>
</head>
<body background="../images/backgroundBarberia.png">
    <div id="login-form"class="container" style="display: block;">
        <h1>Iniciar sesión</h1>
        <div class="container-form">
            <?php if(!empty($message)): ?>
            <div style="color: #fff; background: #c62828; padding: 10px; border-radius: 6px; margin-bottom: 15px; text-align:center; font-weight:bold;">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
            <form method="POST">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
                <br>
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
                <br>
                <input id="submit-button" type="submit" value="Iniciar sesión" name="submit-button">
                <a class="volver"href="registro.php">Registrarse</a>
                <a class="volver"href="../index.php">Volver</a>
            </form>
        </div>
    </div>
    
</body>
</html>