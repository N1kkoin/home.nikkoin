<?php 
    $title = "Mapa FAM - Evolução 2020-2022 - Nikkoin";
    $meta_description = "Projeto de redesign do mapa da FAM - comparação entre versões 2020 e 2022"; 

    include('../../code/navbar.php'); 
?>

<body class="body_artigo">
    <article class="artigo-container">
        <header class="artigo-header">
            <h1>Mapa FAM - Evolução 2020-2022</h1>
            <p class="artigo-categoria">Design Gráfico</p>
        </header>

        <div class="artigo-content">
            <div class="img-principal">
                <img src="/images/dg/MapaFAM_1.png" alt="Mapa FAM" loading="lazy">
            </div>

            <div class="artigo-texto">
                <p>Projeto de redesign do mapa da FAM - Faculdade de Americana. Veja abaixo a evolução do design entre 2020 e 2022.</p>
                <p><em>*Passe o mouse para ver a diferença</em></p>
            </div>

            <div class="aics-wrapper">
                <div id="aics-autostart">
                    <div class="images">
                        <div class="image-rgt" data-src="/images/dg/mapa/2022.png" data-width="100%" data-height="100%"></div>
                        <div class="image-lft" data-src="/images/dg/mapa/2020.png" data-width="100%" data-height="100%"></div>
                    </div>
                </div>
            </div>

            <div class="galeria-imagens">
                <img src="/images/dg/MapaFAM_2.png" alt="Mapa FAM - Detalhes" loading="lazy">
            </div>

            <div class="artigo-navegacao">
                <a href="/portifolio#design-grafico" class="btn-voltar">← Voltar ao Portfólio</a>
            </div>
        </div>
    </article>

    <?php include('../../code/footer.php'); ?>
    
    <script defer src='https://cdn.jsdelivr.net/npm/jquery-anyimagecomparisonslider-plugin'></script>
</body>
</html>
