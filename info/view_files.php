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

// Consulta para obter os arquivos do usuário
$stmt = $conn->prepare("SELECT file_name FROM uploads WHERE client_username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Upload de arquivos
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file']) && isset($_POST['client_username'])) {
    $client_username = htmlspecialchars(trim($_POST['client_username'])); // Sanitização da entrada

    // Verificação do tamanho do arquivo
    if ($_FILES['file']['size'] > 2 * 1024 * 1024) {
        die("O arquivo é muito grande.");
    }

    // Validação da extensão
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extensions)) {
        die("Tipo de arquivo não permitido.");
    }

    // Validação do tipo MIME
    $file_mime_type = mime_content_type($_FILES['file']['tmp_name']);
    $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($file_mime_type, $allowed_mime_types)) {
        die("Tipo de arquivo não permitido.");
    }

    // Diretório de upload
    $target_dir = "uploads/$client_username/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // Registro do upload no banco de dados
        $stmt = $conn->prepare("INSERT INTO uploads (client_username, file_name) VALUES (?, ?)");
        $stmt->bind_param("ss", $client_username, $target_file);
        $stmt->execute();

        // Redireciona de volta para a mesma página com uma mensagem de sucesso
        header("Location: view_files.php?username=" . urlencode($client_username) . "&message=Arquivo enviado com sucesso.");
        exit;
    } else {
        echo "Erro ao enviar arquivo.";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Arquivos de <?php echo $username; ?></title>
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

<!-- Formulário de Upload -->
<h2>Enviar Arquivo</h2>
<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <input type="hidden" name="client_username" value="<?php echo htmlspecialchars($username); ?>">
    <button type="submit">Enviar</button>
</form>

<!-- Lista de Arquivos -->
<h2>Arquivos Enviados</h2>
<ul>
    <?php while ($row = $result->fetch_assoc()): ?>
        <li>
            <a href="<?php echo htmlspecialchars($row['file_name']); ?>" download>
                <?php echo htmlspecialchars(basename($row['file_name'])); ?>
            </a>
            <!-- Botão para deletar o arquivo -->
            <form method="POST" action="delete_file.php" style="display:inline;">
                <input type="hidden" name="file_name" value="<?php echo htmlspecialchars($row['file_name']); ?>">
                <input type="hidden" name="client_username" value="<?php echo htmlspecialchars($username); ?>"> <!-- Passa o nome do usuário -->
                <button type="submit" onclick="return confirm('Você tem certeza que deseja excluir este arquivo?');">Deletar</button>
            </form>
        </li>
    <?php endwhile; ?>
</ul>

<a href="admin.php">Voltar para Admin</a>
<a href="logout.php">Sair</a>
</body>

</html>