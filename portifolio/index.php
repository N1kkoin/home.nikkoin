<?php 
    $title = "Nikkoin Portifólio";
    $meta_description = "Conheça meus projetos de Ilustração, Design Gráfico e Web Design"; 

    include('../code/navbar.php'); 
?>

<body class="body_portifolio">
    <div>
        <header class="header_portifolio">
            <h1>Portifólio</h1>
            <p>Qual é o portifólio que deseja ver?</p>
            <div class="button-container">
                <a href="#design-grafico" class="button">Design Gráfico</a>
                <a href="#front-end" class="button">Web Design | Front-end</a>
                <a href="#ilustracoes" class="button">Ilustrações</a>
            </div>
        </header>

        <main class="main_portifolio">
            <div id="design-grafico" class="section">
                <h2 data-link="/portifolio#design-grafico"><i class="fa-solid fa-link"></i> Design Gráfico</h2>
            </div>
            <div class="portfolio-container">
                <!-- Coworking FAM -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/design-grafico/coworking.php">
                        <img src="/images/dg/coworking/coworkingfam.png" alt="Coworking Shopping Park City 2023" class="portfolio-image" loading="lazy">
                    </a>
                </div>
                <!-- Super Trunfo de Memes -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/design-grafico/trunfo-memes.php">
                        <img src="/images/dg/trunfomeme/dg2.png" alt="Super Trunfo de Memes 2022" class="portfolio-image" loading="lazy">
                    </a>
                </div>
                <!-- Calendário FAM -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/design-grafico/calendario.php">
                        <img src="/images/dg/dg3.png" alt="Calendário FAM" class="portfolio-image" loading="lazy">
                    </a>
                </div>
                <!-- Mapa FAM -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/design-grafico/mapa-fam.php">
                        <img src="/images/dg/dg5.png" alt="Mapa FAM" class="portfolio-image" loading="lazy">
                    </a>
                </div>
                <!-- Marca Pessoal -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/design-grafico/marca-pessoal.php">
                        <img src="/images/dg/dg4.png" alt="Marca Pessoal NH" class="portfolio-image" loading="lazy">
                    </a>
                </div>
            </div>

            <div id="front-end" class="section">
                <h2 data-link="/portifolio#front-end"><i class="fa-solid fa-link"></i> Web Design | Front-end</h2>
            </div>

            <div class="portfolio-container">
                <!-- Info FAM -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/front-end/info-fam.php">
                        <img src="/images/fe/infofamimg.png" alt="Info FAM" class="portfolio-image" loading="lazy">
                    </a>
                </div>
                <!-- Seja Veloz -->
                <div class="portfolio-item">
                    <a target="_blank" href="/seja-veloz/">
                        <img src="/images/fe/seja_veloz/sejavelozimg.png" alt="Seja Veloz" class="portfolio-image" loading="lazy">
                    </a>
                </div>
                <!-- Hospital Veterinário FAM -->
                <div class="portfolio-item">
                    <a target="_blank" href="https://hospitalveterinariofam.com.br/">
                        <img src="/images/fe/banner_atedimento.png" alt="Hospital Veterinário FAM" class="portfolio-image" loading="lazy">
                    </a>
                </div>
                <!-- Templates de E-mail -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/front-end/email-templates.php">
                        <img src="/images/fe/templeteemail.png" alt="Templates de E-mail" class="portfolio-image" loading="lazy">
                    </a>
                </div>
            </div>

            <div id="ilustracoes" class="section">
                <h2 data-link="/portifolio#ilustracoes"><i class="fa-solid fa-link"></i> Ilustrações</h2>
            </div>

            <div style="padding-bottom: 80px;" class="portfolio-container">
                <!-- Mariana -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/ilustracoes/mariana.php">
                        <img src="/images/i/i3.png" alt="Ilustração Mariana" class="portfolio-image" loading="lazy">
                    </a>
                </div>
                <!-- Vários -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/ilustracoes/varios.php">
                        <img src="/images/i/i2.png" alt="Ilustrações Variadas" class="portfolio-image" loading="lazy">
                    </a>
                </div>
                <!-- Humanoide -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/ilustracoes/humanoide.php">
                        <img src="/images/i/i5.png" alt="Ilustração Humanoide" class="portfolio-image" loading="lazy">
                    </a>
                </div>
                <!-- Mangá -->
                <div class="portfolio-item">
                    <a href="/portifolio/artigos/ilustracoes/manga.php">
                        <img src="/images/i/i4.png" alt="Ilustração Estilo Mangá" class="portfolio-image" loading="lazy">
                    </a>
                </div>
            </div>
        </main>

        <?php include('../code/footer.php'); ?>

    </div>

    <script src="../code/script.js"></script>
</body>

</html>
