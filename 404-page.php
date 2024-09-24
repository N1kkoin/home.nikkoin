<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="alternate icon" href="images/icone.ico">
    <link rel="icon" href="images/icone.svg">
</head>

<body>
    <?php include 'code/navbar.php'; ?>

    <div class="index_nh">

        <div class="fundodiferenciado_quatrozeroquatro">
            <p class="quatrozeroquatro_er"> 404 ERROR </p>
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