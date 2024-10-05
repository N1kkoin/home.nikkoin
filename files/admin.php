<?php
session_start();
require 'db.php';

// Define o fuso horário para Brasília
date_default_timezone_set('America/Sao_Paulo');

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
    SELECT 
        users.username, 
        users.created_at, 
        COUNT(uploads.client_username) as file_count,
        MAX(posts.created_at) as last_post_date
    FROM 
        users 
    LEFT JOIN uploads ON users.username = uploads.client_username
    LEFT JOIN posts ON users.username = posts.client_username
    WHERE 
        users.username LIKE ?
    GROUP BY 
        users.username
");
$search_param = "%" . $filter . "%";
$stmt->bind_param("s", $search_param);
$stmt->execute();
$result = $stmt->get_result();

// Fecha a declaração
$stmt->close();

// Função para formatar as datas
function formatDate($date) {
    return date('d/m/Y H:i:s', strtotime($date));
}

// Função para exibir a tabela de usuários
function displayUsers($result) {
    $output = '';
    while ($row = $result->fetch_assoc()) {
        $output .= '<tr>';
        $output .= '<td class="username-cell"><a href="view_files.php?username=' . urlencode($row['username']) . '">' . htmlspecialchars($row['username']) . '</a></td>';
        $output .= '<td class="creation-date-cell">' . formatDate($row['created_at']) . '</td>';
        $output .= '<td class="file-count-cell">' . (int)$row['file_count'] . '</td>';
        $output .= '<td class="last-post-cell">' . ($row['last_post_date'] ? formatDate($row['last_post_date']) : 'Nenhum post') . '</td>';
        $output .= '</tr>';
    }
    return $output;
}

// Se for uma requisição AJAX, retorne apenas os resultados
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    echo displayUsers($result);
    exit; // Para evitar a impressão do restante do HTML
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Área Administrativa - Lista de Usuários</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        // A cada mudança no input de busca
        $('#search').on('input', function() {
            var searchQuery = $(this).val();

            $.ajax({
                url: 'admin.php', // Mesmo arquivo para processar a busca
                type: 'POST',
                data: {
                    search: searchQuery
                },
                success: function(data) {
                    $('#results tbody').html(data); // Atualiza a tabela com os resultados
                }
            });
        });
    });
    </script>
</head>

<body>
    <div class="admin-area">
        <h1>Área Administrativa</h1>
        <p>Lista de todos os usuários</p>

        <!-- Formulário de pesquisa -->
        <form id="search-form" method="POST" action="">
            <input type="text" id="search" name="search" class="search-input" placeholder="Buscar usuário"
                value="<?php echo htmlspecialchars($filter); ?>">
        </form>

        <h2>Lista de Usuários</h2>
        <div id="results">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>Nome de Usuário</th>
                        <th>Data de Criação</th>
                        <th>Número de Arquivos Enviados</th>
                        <th>Última Modificação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo displayUsers($result); // Exibe os usuários inicialmente ?>
                </tbody>
            </table>
        </div>
        <a class="logout-link" href="logout.php">Sair</a>
    </div>
    <script src="assets/js/script.js"></script>
</body>

</html>
