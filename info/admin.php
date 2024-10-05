<?php
session_start();
require 'db.php';

// Verifica se o usuário é admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

// Filtro de nome de usuário
$filter = "";
if (isset($_POST['search'])) {
    $filter = htmlspecialchars(trim($_POST['search'])); // Sanitização da entrada
}

// Prepara a consulta para obter a lista de usuários
$stmt = $conn->prepare("
    SELECT users.username, users.created_at, 
    (SELECT MAX(upload_date) FROM uploads WHERE uploads.client_username = users.username) as last_upload
    FROM users WHERE users.username LIKE ?
");
$search_param = "%" . $filter . "%";
$stmt->bind_param("s", $search_param);
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
        echo "Arquivo enviado com sucesso!";
    } else {
        echo "Erro ao enviar arquivo.";
    }
}

// Fecha a declaração
$stmt->close();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Área Administrativa - Lista de Usuários</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>Área Administrativa</h1>
    <p>Lista de todos os usuários</p>
    
 <!-- Formulário de pesquisa -->
 <form method="POST" action="">
        <input type="text" name="search" placeholder="Buscar usuário" value="<?php echo htmlspecialchars($filter); ?>">
        <button type="submit">Buscar</button>
    </form>

    <h2>Lista de Usuários</h2>
    <table>
        <thead>
            <tr>
                <th>Nome de Usuário</th>
                <th>Data de Criação</th>
                <th>Último Upload</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    <td><?php echo $row['last_upload'] ? htmlspecialchars($row['last_upload']) : 'Nenhum'; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


    <!-- Formulário de upload -->
    <h2>Enviar Arquivos para Usuário</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="client_username" placeholder="Nome de Usuário do Cliente" required>
        <input type="file" name="file" required>
        <button type="submit">Enviar</button>
    </form>

    <a href="logout.php">Sair</a>
</body>
</html>
