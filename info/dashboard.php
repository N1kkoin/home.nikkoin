<?php
session_start();
require 'db.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Obtém o nome de usuário da sessão e sanitiza a saída
$username = htmlspecialchars($_SESSION['username']);

// Busca os posts relacionados ao usuário
$stmt = $conn->prepare("SELECT * FROM posts WHERE client_username = ? ORDER BY created_at DESC");
$stmt->bind_param("s", $username);
$stmt->execute();
$posts_result = $stmt->get_result();
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

    <!-- Exibe os posts do admin -->
    <h2>Posts para você:</h2>
    <ul>
        <?php if ($posts_result->num_rows > 0): ?>
        <?php while ($post = $posts_result->fetch_assoc()): ?>
        <li>
            <h3><?php echo htmlspecialchars($post['title']); ?></h3>
            <p><?php echo htmlspecialchars($post['description']); ?></p>
            <p><strong>Tags:</strong> <?php echo htmlspecialchars($post['tags']); ?></p>

            <!-- Exibe a imagem da miniatura do post -->
            <?php if (!empty($post['thumbnail'])): ?>
            <img src="uploads/<?php echo htmlspecialchars($username); ?>/<?php echo htmlspecialchars($post['thumbnail']); ?>"
                alt="Miniatura do Post" style="max-width: 100px; max-height: 100px;" />
            <?php else: ?>
            <p>Nenhuma miniatura disponível para este post.</p>
            <?php endif; ?>

            <!-- Exibe os arquivos relacionados ao post -->
            <h4>Arquivos do Post:</h4>
            <ul>
                <?php 
                        // Busca os arquivos relacionados ao post no banco de dados
                        $stmt_files = $conn->prepare("SELECT file_name FROM uploads WHERE post_id = ?");
                        $stmt_files->bind_param("i", $post['id']);
                        $stmt_files->execute();
                        $files_result = $stmt_files->get_result();

                        if ($files_result->num_rows > 0): 
                            while ($file = $files_result->fetch_assoc()):
                                $safe_file = htmlspecialchars($file['file_name']);
                                $file_extension = pathinfo($safe_file, PATHINFO_EXTENSION);

                                 // Exibe apenas o link para arquivos que são imagens
                                 if (in_array($file_extension, ['jpg', 'jpeg', 'png'])): ?>
                <li>
                    <a href="<?php echo htmlspecialchars($safe_file); ?>" download>
                        <?php echo basename($safe_file); ?>
                    </a>
                </li>
                <?php else: ?>
                <li><a href="<?php echo htmlspecialchars($safe_file); ?>"
                        download><?php echo basename($safe_file); ?></a></li>
                <?php endif; ?>
                <?php endwhile; 
                        else: ?>
                <li>Nenhum arquivo anexado a este post.</li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endwhile; ?>
        <?php else: ?>
        <li>Nenhum post disponível.</li>
        <?php endif; ?>
    </ul>

    <a href="logout.php">Sair</a>
</body>

</html>