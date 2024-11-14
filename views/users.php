<?php
require_once '../includes/auth.php';

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
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Usuarios Registrados</h1>
    <table id="userTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <h2>Registrar Usuario</h2>
    <input type="text" id="username" placeholder="Nombre de Usuario">
    <button onclick="createUser()">Registrar</button>
    <a href="dashboard.php">Volver al Dashboard</a>
    <script src="../js/scripts.js"></script>
</body>
</html>
