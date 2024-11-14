<?php
require_once '../includes/auth.php';

$auth = new Auth();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($auth->login($username, $password)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Credenciales incorrectas";
    }
}

if ($auth->isLoggedIn()) {
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <form method="POST">
        <h2>Iniciar Sesión</h2>
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    </form>
</body>
</html>
