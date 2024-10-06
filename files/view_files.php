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

// Função para sanitizar o nome do arquivo
function sanitizeFileName($filename) {
    // Remove caracteres especiais e espaços, mantendo apenas letras, números, underline e hífen
    return preg_replace('/[^a-zA-Z0-9-_\.]/', '_', $filename);
}

// Processar a criação do post
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['client_username'])) {
    $client_username = htmlspecialchars(trim($_POST['client_username']));
    $title = htmlspecialchars(trim($_POST['title']));
    $description = htmlspecialchars(trim($_POST['description']));
    $tags = htmlspecialchars(trim($_POST['tags']));

    // Inserir os dados do post no banco de dados
    $stmt = $conn->prepare("INSERT INTO posts (client_username, title, description, tags, thumbnail) VALUES (?, ?, ?, ?, ?)");

    // Processar o upload da miniatura
    $thumbnail_name = '';
    if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == UPLOAD_ERR_OK) {
        $thumbnail_name = sanitizeFileName($_FILES['thumbnail']['name']);
        $thumbnail_name = time() . "_" . $thumbnail_name; // Adiciona um timestamp
        $thumbnail_tmp_name = $_FILES['thumbnail']['tmp_name'];
        $thumbnail_target = "uploads/$client_username/" . basename($thumbnail_name);
        
        $allowed_extensions = ['jpg', 'jpeg', 'png']; // Adicione as extensões permitidas
        $file_extension = strtolower(pathinfo($thumbnail_name, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            echo "Formato de arquivo não suportado: $file_extension";
            exit;
        }

   
    // Mover a imagem da miniatura
    if (!move_uploaded_file($thumbnail_tmp_name, $thumbnail_target)) {
        // Mensagens de erro mais específicas
        $error_message = error_get_last();
        echo "Erro ao enviar a imagem da miniatura. Detalhes: " . htmlspecialchars($error_message['message']);
        exit;
    }
    } elseif ($_FILES['thumbnail']['error'] !== UPLOAD_ERR_NO_FILE) {
        echo "Erro no upload da miniatura: " . $_FILES['thumbnail']['error'];
        exit;
    } else {
        $thumbnail_name = null; // Caso não haja imagem da miniatura
    }

    $stmt->bind_param("sssss", $client_username, $title, $description, $tags, $thumbnail_name);
    
    if (!$stmt->execute()) {
        echo "Erro ao criar post: " . $stmt->error;
        exit;
    }
    $post_id = $stmt->insert_id; // Obter o ID do post recém-criado

    // Processar o upload dos arquivos
    if (isset($_FILES['files'])) {
        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['files']['error'][$key] == UPLOAD_ERR_OK) {
                $file_name = $_FILES['files']['name'][$key];
                $file_tmp_name = $_FILES['files']['tmp_name'][$key];
                $target_file = "uploads/$client_username/" . basename($file_name);

                // Certifica-se de que o diretório existe
                if (!is_dir("uploads/$client_username/")) {
                    if (!mkdir("uploads/$client_username/", 0777, true)) {
                        echo "Erro ao criar o diretório para upload.";
                        exit;
                    }
                }

                // Mover o arquivo enviado para o diretório de destino
                if (move_uploaded_file($file_tmp_name, $target_file)) {
                    // Registro do arquivo no banco de dados
                    $stmt = $conn->prepare("INSERT INTO uploads (client_username, file_name, post_id) VALUES (?, ?, ?)");
                    $stmt->bind_param("ssi", $client_username, $target_file, $post_id);
                    $stmt->execute();
                } else {
                    echo "Erro ao enviar o arquivo: $file_name";
                }
            } else {
                echo "Erro no upload do arquivo: " . $_FILES['files']['name'][$key] . ". Código de erro: " . $_FILES['files']['error'][$key];
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
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="admin-area">
        <h1>Arquivos de <?php echo htmlspecialchars($username); ?></h1>

        <!-- Mensagens de Sucesso ou Erro -->
        <?php if ($message): ?>
        <div class="message success"><?php echo $message; ?></div>
        <?php endif; ?>

        <?php if ($error): ?>
        <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>

        <!-- Formulário de Upload -->
        <h2>Enviar Arquivo</h2>
        <form method="POST" enctype="multipart/form-data" class="upload-form">
            <input type="file" name="thumbnail" required class="file-input">
            <input type="file" name="files[]" multiple required class="file-input">
            <input type="hidden" name="client_username" value="<?php echo htmlspecialchars($username); ?>">
            <input type="text" name="title" placeholder="Título" required class="text-input">
            <textarea name="description" placeholder="Descrição" required class="textarea-input"></textarea>
            <input type="text" name="tags" placeholder="Tags (separadas por vírgula)" required class="text-input">
            <button type="submit" class="submit-button">Enviar</button>
        </form>

        <!-- Lista de Arquivos -->
        <h2>Posts Enviados</h2>
        <ul class="posts-list">
            <?php if ($result_posts->num_rows > 0): ?>
            <?php while ($row = $result_posts->fetch_assoc()): ?>
            <li class="post-item">
                <strong><?php echo htmlspecialchars($row['title']); ?></strong><br>
                <em><?php echo htmlspecialchars($row['description']); ?></em><br>
                <small>Tags: <?php echo htmlspecialchars($row['tags']); ?></small><br>

                <?php
                // Exibe a imagem da miniatura
                if (!empty($row['thumbnail'])):
                    $thumbnail_path = "uploads/" . htmlspecialchars($username) . "/" . htmlspecialchars($row['thumbnail']);
                    if (file_exists($thumbnail_path)): ?>
                        <img src="<?php echo $thumbnail_path; ?>" alt="Imagem do Post" class="thumbnail-img" />
                    <?php else: ?>
                        <p>A miniatura não está disponível no caminho: <?php echo $thumbnail_path; ?></p>
                    <?php endif;
                else: ?>
                    <p>Nenhuma imagem disponível para este post.</p>
                <?php endif; ?>

                <?php
                // Consulta para obter os arquivos associados ao post
                $stmt_files = $conn->prepare("SELECT file_name FROM uploads WHERE post_id = ?");
                $stmt_files->bind_param("i", $row['id']);
                $stmt_files->execute();
                $result_files = $stmt_files->get_result();
                ?>
                <ul>
                    <?php while ($file_row = $result_files->fetch_assoc()): ?>
                    <li><?php echo htmlspecialchars($file_row['file_name']); ?></li>
                    <?php endwhile; ?>
                </ul>

                <form method="POST">
                    <input type="hidden" name="delete_post_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="delete-button">Deletar Post</button>
                </form>
            </li>
            <?php endwhile; ?>
            <?php else: ?>
            <p>Nenhum post encontrado para este usuário.</p>
            <?php endif; ?>
        </ul>
    </div>

</body>
</html>
