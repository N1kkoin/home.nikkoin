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
    COUNT(uploads.client_username) as file_count
    FROM users 
    LEFT JOIN uploads ON users.username = uploads.client_username
    WHERE users.username LIKE ?
    GROUP BY users.username
");
$search_param = "%" . $filter . "%";
$stmt->bind_param("s", $search_param);
$stmt->execute();
$result = $stmt->get_result();


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
                <th>Número de Arquivos Enviados</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td>
                        <a href="view_files.php?username=<?php echo urlencode($row['username']); ?>">
                            <?php echo htmlspecialchars($row['username']); ?>
                        </a>
                    </td>
                    <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                    <td><?php echo (int)$row['file_count']; ?></td>
                   
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <a href="logout.php">Sair</a>
</body>
</html>