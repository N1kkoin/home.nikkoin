<?php
session_start();
require 'db.php';

// Verifica se o usuário está logado e é admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Verifica se o nome do arquivo foi enviado
if (isset($_POST['file_name'])) {
    $file_name = htmlspecialchars(trim($_POST['file_name']));

    // Verifica se o arquivo existe e tenta deletá-lo
    if (file_exists($file_name)) {
        if (unlink($file_name)) {
            // Remover o registro do banco de dados
            $stmt = $conn->prepare("DELETE FROM uploads WHERE file_name = ?");
            $stmt->bind_param("s", $file_name);
            $stmt->execute();

            // Redireciona de volta para a página de arquivos com uma mensagem de sucesso
            header("Location: view_files.php?username=" . urlencode($_POST['client_username']) . "&message=Arquivo excluído com sucesso.");
            exit;
        } else {
            // Se não conseguir deletar o arquivo
            header("Location: view_files.php?username=" . urlencode($_POST['client_username']) . "&error=Erro ao excluir o arquivo.");
            exit;
        }
    } else {
        // Se o arquivo não existir
        header("Location: view_files.php?username=" . urlencode($_POST['client_username']) . "&error=Arquivo não encontrado.");
        exit;
    }
} else {
    // Se não foi fornecido um nome de arquivo
    header("Location: admin.php?error=Arquivo não especificado.");
    exit;
}
?>
