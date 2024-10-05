<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitização da entrada do usuário
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];

    // Validação do nome de usuário
    if (empty($username) || strlen($username) < 3) {
        die("Nome de usuário deve ter pelo menos 3 caracteres.");
    }

    // Hashing da senha
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepara a consulta para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Registro concluído com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
}
?>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Nome de usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Registrar</button>
</form>
