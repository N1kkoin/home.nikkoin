<?php
session_start();

if (isset($_SESSION['username'])) {
    // Redireciona de acordo com o papel do usuário
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin.php");
    } else {
        header("Location: dashboard.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Sistema de Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="container">
        <h1>Bem-vindo ao Sistema de Clientes</h1>
        <p>Por favor, faça login ou registre-se para acessar sua área.</p>
        
        <div class="actions">
            <a href="login.php" class="btn">Login</a>
            <a href="register.php" class="btn">Registrar</a>
        </div>
    </div>

</body>
</html>
