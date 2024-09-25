<?php
// Obter o código de status do redirecionamento
$error_code = $_SERVER['REDIRECT_STATUS'];

// Definir uma mensagem padrão
$error_message = 'Erro desconhecido';

// Verificar o código de status e definir a mensagem apropriada
switch ($error_code) {
    case 400:
        $error_message = '400 ERROR: Requisição Inválida';
        break;
    case 401:
        $error_message = '401 ERROR: Não autorizado';
        break;
    case 403:
        $error_message = '403 ERROR: Acesso Proibido';
        break;
    case 404:
        $error_message = '404 ERROR: Página não encontrada';
        break;
    case 500:
        $error_message = '500 ERROR: Erro Interno do Servidor';
        break;
    case 502:
        $error_message = '502 ERROR: Bad Gateway';
        break;
    case 503:
        $error_message = '503 ERROR: Serviço Indisponível';
        break;
    case 504:
        $error_message = '504 ERROR: Gateway Timeout';
        break;
}

// Exibir a mensagem de erro
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $error_code; ?> - Erro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="alternate icon" href="images/icone.ico">
    <link rel="icon" href="images/icone.svg">
</head>

<body>
    <?php include 'code/navbar.php'; ?>

    <div class="index_nh">

        <div class="fundodiferenciado_quatrozeroquatro">
            <p class="quatrozeroquatro_er"><?php echo $error_message; ?></p>
            <h2>Essa página não existe :/</h2>
            <p>Redirecionando para a página inicial em <span id="countdown">5</span> segundos!</p>
        </div>

        <?php include 'code/footer.php'; ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <script>
    // COUNTDRON 404 PAGE ---------------------------///////////////////////

    document.addEventListener('DOMContentLoaded', function() {
        let countdown = 5;
        const countdownElement = document.getElementById('countdown');

        const interval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown === 0) {
                clearInterval(interval);
                window.location.href = '/';
            }
        }, 1000);
    });
    </script>
</body>

</html>