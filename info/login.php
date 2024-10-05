<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitização da entrada do usuário
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];

    // Prepara a consulta para evitar SQL Injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verifica a senha
        if (password_verify($password, $user['password'])) {
            // Regenera ID de sessão para segurança
            session_regenerate_id(true);
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];  // Armazena o papel do usuário na sessão
            
            // Redireciona de acordo com o papel do usuário
            if ($user['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: dashboard.php");
            }
            exit;
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
}
?>


<form method="POST" action="">
    <input type="text" name="username" placeholder="Nome de usuário" required>
    <input type="password" name="password" placeholder="Senha" required>
    <button type="submit">Entrar</button>
</form>
