<?php
session_start();
require 'db.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Obtém o nome do usuário
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : null;

// Verifica se o usuário é válido
if ($username === null) {
    die("Usuário inválido.");
}

// Mensagem de sucesso ou erro
$message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';
$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';

// Consulta para obter os posts do usuário
$stmt = $conn->prepare("SELECT * FROM posts WHERE client_username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result_posts = $stmt->get_result();

// Processar a criação do post
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['client_username'])) {
    $client_username = htmlspecialchars(trim($_POST['client_username']));
    $title = htmlspecialchars(trim($_POST['title']));
    $description = htmlspecialchars(trim($_POST['description']));
    $tags = htmlspecialchars(trim($_POST['tags']));

    // Inserir os dados do post no banco de dados
    $stmt = $conn->prepare("INSERT INTO posts (client_username, title, description, tags) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $client_username, $title, $description, $tags);
    $stmt->execute();
    
    $post_id = $stmt->insert_id; // Obter o ID do post recém-criado

    // Processar o upload dos arquivos
    if (isset($_FILES['files'])) {
        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['files']['error'][$key] == UPLOAD_ERR_OK) {
                $file_name = $_FILES['files']['name'][$key];
                $target_file = "uploads/$client_username/" . basename($file_name);

                if (move_uploaded_file($tmp_name, $target_file)) {
                    // Registro do arquivo no banco de dados
                    $stmt = $conn->prepare("INSERT INTO uploads (client_username, file_name, post_id) VALUES (?, ?, ?)");
                    $stmt->bind_param("ssi", $client_username, $target_file, $post_id);
                    $stmt->execute();
                } else {
                    echo "Erro ao enviar o arquivo: $file_name";
                }
            }
        }
    }

    // Redireciona de volta com uma mensagem de sucesso
    header("Location: view_files.php?username=" . urlencode($client_username) . "&message=Post criado com sucesso.");
    exit;
}

// Processar a exclusão do post
if (isset($_POST['delete_post_id'])) {
    $post_id_to_delete = $_POST['delete_post_id'];

    // Deletar os arquivos associados ao post
    $stmt = $conn->prepare("SELECT file_name FROM uploads WHERE post_id = ?");
    $stmt->bind_param("i", $post_id_to_delete);
    $stmt->execute();
    $files_to_delete = $stmt->get_result();

    while ($row = $files_to_delete->fetch_assoc()) {
        unlink($row['file_name']); // Remove o arquivo do sistema
    }

    // Deletar o post
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $post_id_to_delete);
    $stmt->execute();

    // Deletar os uploads do banco de dados
    $stmt = $conn->prepare("DELETE FROM uploads WHERE post_id = ?");
    $stmt->bind_param("i", $post_id_to_delete);
    $stmt->execute();

    // Redireciona de volta com uma mensagem de sucesso
    header("Location: view_files.php?username=" . urlencode($username) . "&message=Post deletado com sucesso.");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Arquivos de <?php echo htmlspecialchars($username); ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

<h1>Arquivos de <?php echo htmlspecialchars($username); ?></h1>

<!-- Mensagens de Sucesso ou Erro -->
<?php if ($message): ?>
    <div class="success"><?php echo $message; ?></div>
<?php endif; ?>

<?php if ($error): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

<!-- Formulário de Criar Post -->
<h2>Criar Post</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Título" required>
    <textarea name="description" placeholder="Descrição" required></textarea>
    <input type="text" name="tags" placeholder="Tags (separadas por vírgula)" required>
    <input type="file" name="files[]" multiple required>
    <input type="hidden" name="client_username" value="<?php echo htmlspecialchars($username); ?>">
    <button type="submit">Criar Post</button>
</form>

<!-- Lista de Posts -->
<h2>Posts Enviados</h2>
<ul>
    <?php if ($result_posts->num_rows > 0): ?>
        <?php while ($row = $result_posts->fetch_assoc()): ?>
            <li>
                <strong><?php echo htmlspecialchars($row['title']); ?></strong><br>
                <em><?php echo htmlspecialchars($row['description']); ?></em><br>
                <small>Tags: <?php echo htmlspecialchars($row['tags']); ?></small><br>
                <form method="POST" action="edit_post.php" style="display:inline;">
                    <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
                    <button type="submit">Editar</button>
                </form>
                <form method="POST" action="" style="display:inline;">
                    <input type="hidden" name="delete_post_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" onclick="return confirm('Você tem certeza que deseja excluir este post?');">Deletar</button>
                </form>
            </li>
        <?php endwhile; ?>
    <?php else: ?>
        <li>Nenhum post encontrado para este usuário.</li>
    <?php endif; ?>
</ul>

<a href="admin.php">Voltar para Admin</a>
<a href="logout.php">Sair</a>
</body>

</html>
