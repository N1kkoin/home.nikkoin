<?php
session_start();
require 'db.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit; // Termina a execução após o redirecionamento
}

// Obtém o nome de usuário da sessão e sanitiza a saída
$username = htmlspecialchars($_SESSION['username']);

// Diretório do usuário
$dir = "uploads/$username/";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Área do Cliente</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <h1>Bem-vindo, <?php echo $username; ?>!</h1>
    <p>Aqui estão os seus arquivos:</p>

    <ul>
        <?php
        // Verifica se o diretório do usuário existe
        if (is_dir($dir)) {
            $files = scandir($dir);
            // Filtra os arquivos para evitar o acesso a arquivos indesejados
            foreach ($files as $file) {
                // Evita os diretórios '.' e '..' e verifica se é um arquivo regular
                if ($file !== "." && $file !== ".." && is_file($dir . $file)) {
                    // Escapa o nome do arquivo para evitar XSS
                    $safe_file = htmlspecialchars($file);
                    echo "<li><a href='" . htmlspecialchars($dir . $safe_file) . "' download>$safe_file</a></li>";
                }
            }
        } else {
            echo "<li>Nenhum arquivo disponível.</li>";
        }
        ?>
    </ul>

    <a href="logout.php">Sair</a>
</body>
</html>
