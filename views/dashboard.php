<?php
require_once '../includes/auth.php';
require_once '../includes/session.php';

$auth = new Auth();
if (!$auth->isLoggedIn()) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Bienvenido al Dashboard</h1>
    <a href="users.php">Gestión de Usuarios</a>
    <a href="../logout.php">Cerrar Sesión</a>
</body>
</html>
