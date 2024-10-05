<?php
session_start();
require 'db.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Obtém o ID do post a ser editado
$post_id = isset($_GET['post_id']) ? intval($_GET['post_id']) : null;

// Verifica se o ID do post é válido
if ($post_id === null) {
    die("Post inválido.");
}

// Consulta para obter os detalhes do post
$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

// Verifica se o post existe
if (!$post) {
    die("Post não encontrado.");
}

// Processa a atualização do post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars(trim($_POST['title']));
    $description = htmlspecialchars(trim($_POST['description']));
    $tags = htmlspecialchars(trim($_POST['tags']));
    
    // Atualiza os dados do post no banco de dados
    $stmt = $conn->prepare("UPDATE posts SET title = ?, description = ?, tags = ? WHERE id = ?");
    $stmt->bind_param("sssi", $title, $description, $tags, $post_id);
    $stmt->execute();

    // Processa o upload de arquivos
    if (isset($_FILES['files'])) {
        foreach ($_FILES['files']['name'] as $key => $filename) {
            if ($_FILES['files']['error'][$key] == UPLOAD_ERR_OK) {
                // Verifica se o tamanho do arquivo está dentro do limite
                if ($_FILES['files']['size'][$key] > 2 * 1024 * 1024) {
                    die("O arquivo $filename é muito grande.");
                }

                // Valida a extensão
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
                $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
                if (!in_array($file_extension, $allowed_extensions)) {
                    die("Tipo de arquivo $filename não permitido.");
                }

                // Diretório de upload
                $target_dir = "uploads/posts/$post_id/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                $target_file = $target_dir . basename($filename);
                
                if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $target_file)) {
                    // Registro do upload no banco de dados
                    $stmt_upload = $conn->prepare("INSERT INTO uploads (post_id, file_name) VALUES (?, ?)");
                    $stmt_upload->bind_param("is", $post_id, $target_file);
                    $stmt_upload->execute();
                }
            }
        }
    }

    // Redireciona de volta com uma mensagem de sucesso
    header("Location: view_files.php?username=" . urlencode($post['client_username']) . "&message=Post atualizado com sucesso.");
    exit;
}

// Consulta para obter os arquivos associados ao post
$stmt_files = $conn->prepare("SELECT file_name FROM uploads WHERE post_id = ?");
$stmt_files->bind_param("i", $post_id);
$stmt_files->execute();
$result_files = $stmt_files->get_result();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Post</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<h1>Editar Post</h1>

<!-- Formulário de Edição -->
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Título" value="<?php echo htmlspecialchars($post['title']); ?>" required>
    <textarea name="description" placeholder="Descrição" required><?php echo htmlspecialchars($post['description']); ?></textarea>
    <input type="text" name="tags" placeholder="Tags (separadas por vírgula)" value="<?php echo htmlspecialchars($post['tags']); ?>" required>
    
    <!-- Upload de novos arquivos -->
    <h3>Adicionar Novos Arquivos (opcional)</h3>
    <input type="file" name="files[]" multiple>

    <!-- Exibir arquivos existentes -->
    <h3>Arquivos Existentes</h3>
    <ul>
        <?php while ($file = $result_files->fetch_assoc()): ?>
            <li>
                <a href="<?php echo htmlspecialchars($file['file_name']); ?>" target="_blank">Visualizar Arquivo</a>
                <form method="POST" action="delete_file.php" style="display:inline;">
                    <input type="hidden" name="file_name" value="<?php echo htmlspecialchars($file['file_name']); ?>">
                    <button type="submit" onclick="return confirm('Você tem certeza que deseja excluir este arquivo?');">Deletar</button>
                </form>
            </li>
        <?php endwhile; ?>
    </ul>

    <button type="submit">Atualizar Post</button>
</form>

<a href="view_files.php?username=<?php echo urlencode($post['client_username']); ?>">Voltar para Posts</a>
<a href="logout.php">Sair</a>
</body>
</html>
