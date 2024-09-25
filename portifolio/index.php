<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nikkoin Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="alternate icon" href="../images/icone.ico"> <!-- Ajuste o caminho -->
    <link rel="icon" href="../images/icone.svg"> <!-- Ajuste o caminho -->
</head>

<body class="body_portifolio">
    <?php include('../code/navbar.php'); ?>
    <!-- Use ../ para voltar um nível -->

    <div>
        <header class="header_portifolio">
            <h1>Portifólio</h1>
            <p>Qual é o assunto que te interessa?</p>
            <div class="button-container">
                <a href="#section1" class="button">Design Gráfico</a>
                <a href="#section2" class="button">Web Design | Front-end</a>
                <a href="#section3" class="button">Ilustrações</a>
            </div>
        </header>



        <main class="main_portifolio">
       
            <div id="section1" class="section">Conteúdo da Seção 1</div>
            <div id="section2" class="section">Conteúdo da Seção 2</div>
            <div id="section3" class="section">Conteúdo da Seção 3</div>
        </main>

        <?php include('../code/footer.php'); ?>
        <!-- Use ../ para voltar um nível -->

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../code/script.js"></script> <!-- Use ../ para voltar um nível -->
</body>

</html>