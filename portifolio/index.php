<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nikkoin Portifólio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="alternate icon" href="../images/icone.ico"> <!-- Ajuste o caminho -->
    <link rel="icon" href="../images/icone.svg"> <!-- Ajuste o caminho -->
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-23BZZMMJMP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-23BZZMMJMP');
</script>

<body class="body_portifolio">
    <?php include('../code/navbar.php'); ?>
    <!-- Use ../ para voltar um nível -->

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
                <!-- Imagem 1 -->
                <div class="portfolio-item" data-overlay="overlay1">
                    <img src="/images/dg/coworking/coworkingfam.png" alt="Imagem 1" class="portfolio-image">
                </div>
                <!-- Imagem 5 -->
                <div class="portfolio-item" data-overlay="overlay5">
                    <img src="/images/dg/trunfomeme/dg2.png" alt="Imagem 3" class="portfolio-image">
                </div>
                <!-- Imagem 2 -->
                <div class="portfolio-item" data-overlay="overlay2">
                    <img src="/images/dg/dg3.png" alt="Imagem 2" class="portfolio-image">
                </div>
                <!-- Imagem 3 -->
                <div class="portfolio-item" data-overlay="overlay3">
                    <img src="/images/dg/dg5.png" alt="Imagem 3" class="portfolio-image">
                </div>
                <!-- Imagem 4 -->
                <div class="portfolio-item" data-overlay="overlay4">
                    <img src="/images/dg/dg4.png" alt="Imagem 3" class="portfolio-image">
                </div>
            </div>

            <!-- Overlays -->
            <div id="overlay1" class="overlay">
                <div class="overlay-content">
                    <div class="coworking">
                        <div class="img-principal"><img src="/images/dg/coworking/coworkingfam.png" alt="Image 1">
                        </div>
                        <h1>Coworking Shopping Park City <span style="color: #e53888;">2</span><span
                                style="color: #f9e20f;">0</span><span style="color: #45B7E5;">2</span><span
                                style="color: #1b3556;">3</span></h1>
                        <p>Gostaria de falar um pouco do processo de um trabalho recente que fiz no Coworking da
                            FAM -
                            Faculdade
                            de Americana do Shopping Park City de Sumaré. Me foi dado
                            liberdade para fazer o que eu quisesse, com o tema “abstrato” e contendo a frase
                            <i>“O
                                responsável
                                por suas vitórias, seu futuro e por realizar seus sonhos é você!”</i>
                        </p>
                        <p>Comecei pensando em regras, o espaço pede para ser calmo e o branco da parede permite
                            isso,
                            então não
                            podia cobrir a parede com cor, o que faria o ambiente poluído visualmente, não
                            ajudando quem
                            fosse
                            lá para descansar ou trabalhar.
                            Também queria trabalhar algumas cores da marca que na época não estavam sendo tão
                            trabalhadas. A
                            maioria das cores são frias, mas o amarelo e o rosa dão uma vida a mais devido ao
                            contraste.
                        </p>
                        <p>Com essas regras imaginarias na cabeça, já sabia que o ideal era um arco, a parte
                            onde a
                            pessoa
                            trabalha não seria tão tocada pela arte e assim também conseguiria brincar com a
                            frase de
                            uma forma
                            interessante, depois disso <a target="blank_"
                                href="https://www.instagram.com/danicassitas/">@danicassitas</a> teve a ideia de
                            colocar
                            um
                            espelho no ‘você’ (antes o você
                            estava no círculo só que fora), fazendo o trabalho final ser mais interessante, já
                            que se
                            tornou
                            interativo.
                            Se repararam, o mockup não tem a faixa vertical do lado. Na vida do designer às
                            vezes coisas
                            imprevistas ocorrem e isso fez a frase ficar dividida nas duas paredes, mas o
                            conceito não
                            mudou e a
                            parte do espelho, por eu dar uma margem maior, não sofreu com a mudança.</p>
                        <p>De qualquer forma, gostei do resultado e espero que os que viram também ;)
                            </br></br>Modelo da foto: <a target="blank_"
                                href="https://www.instagram.com/alemarasampaio/">@alemarasampaio</a>
                            </br>Publicado no meu IG <a target="blank_"
                                href="https://www.instagram.com/alemarasampaio/">@nikkoin_</a></p>

                        <div class="coworkingstyle">
                            <div class="div1"><img src="/images/dg/coworking/coworkingfam_2.png" alt="Image"></div>
                            <div class="div2"><img src="/images/dg/coworking/coworkingfam_3.png" alt="Image">
                            </div>
                            <div class="div3"><img src="/images/dg/coworking/coworkingfam_4.png" alt="Image"></div>
                        </div>
                    </div>
                </div>
                <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
            </div>

            <div id="overlay5" class="overlay">
                <div class="overlay-content">
                    <div class="trunfo">
                        <div class="img-principal"><img src="/images/dg/trunfomeme/meme_1.png"></div>
                        <div class="trunfomeme ">
                            <h1>Super Trunfo de Memes <span style="color: #C82D36;">2022</span></h1>
                            <p>Destaco o Super Trunfo, entre um dos projetos acadêmicos que mais aprecio, desenvolvido
                                durante o curso de Design Gráfico.
                                Tínhamos que criar um super trunfo comemorativo, e depois de um brainstorm, escolhemos o
                                tema de memes. Em 2022 fez 101 anos que o primeiro meme (que temos conhecimento) foi
                                criado.
                            </p>

                            <p>Posteriormente, em diversos eventos da faculdade, nossos trabalhos, incluindo este
                                baralho,
                                foram apresentados ao público geral. Nos que participei, pude observar de perto
                                a reação positiva do público em relação do baralho, principalmente entre o público
                                juvenil.

                                </br></br>
                                <a target="blank_" href="https://www.instagram.com/murderesstired/">Ana</a> — Pesquisa
                                das
                                datas de Surgimento.
                                </br><a target="blank_" href="https://www.behance.net/levy-laduig-cabral">Levy</a> —
                                Informações e design da embalagem (função primária).
                                </br><a target="blank_" href="https://nikkoin.art/">Nicole</a> — Diagramação, design das
                                cartas e design da embalagem (função secundária).
                            <p>
                        </div>

                        <div class="segunda"><img src="/images/dg/trunfomeme/meme_2.png"></div>
                    </div>
                    <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div id="overlay2" class="overlay">
                <div class="overlay-content">
                    <div class="calendario"> <img src="/images/dg/dg3.5.png"></div>
                    <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div id="overlay3" class="overlay">
                <div class="overlay-content">
                    <div class="mapa ">
                        <img src="/images/dg/MapaFAM_1.png">
                        <div class="aics-wrapper">
                            *Passe o mouse para ver a diferença
                            <div id="aics-autostart">
                                <div class="images">
                                    <div class="image-rgt" data-src="/images/dg/mapa/2022.png" data-width="100%"
                                        data-height="100%"></div>
                                    <div class="image-lft" data-src="/images/dg/mapa/2020.png" data-width="100%"
                                        data-height="100%"></div>
                                </div>
                            </div>
                        </div>
                        <img src="/images/dg/MapaFAM_2.png">
                    </div>
                    <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div id="overlay4" class="overlay">
                <div class="overlay-content">
                    <div class="eu"> <img src="/images/dg/NH_marca.png"></div>
                    <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div id="front-end" class="section">
                <h2 data-link="/portifolio#front-end"><i class="fa-solid fa-link"></i> Web Design | Front-end</h2>
            </div>

            <div class="portfolio-container">
                <!-- Imagem 1 -->
                <div class="portfolio-item" data-overlay="info-fam">
                    <img src="/images/fe/infofamimg.png" alt="Imagem 1" class="portfolio-image">
                </div>
                <!-- Imagem 2 -->
                <div class="portfolio-item">
                    <a target="_blank" href="/seja-veloz/"><img src="/images/fe/seja_veloz/sejavelozimg.png" alt="Imagem 2" class="portfolio-image"></a>
                </div>
                <!-- Imagem 3 -->
                <div class="portfolio-item">
                    <a target="_blank" href="https://hospitalveterinariofam.com.br/"><img src="/images/fe/banner_atedimento.png" alt="Imagem 3" class="portfolio-image"></a>
                </div>
                <!-- Imagem 4 -->
                <div class="portfolio-item" data-overlay="email">
                    <img src="/images/fe/templeteemail.png" alt="Imagem 3" class="portfolio-image">
                </div>
            </div>

            <!-- Overlays -->
            <div id="info-fam" class="overlay">
                <div class="overlay-content">
                    <iframe src="//jsfiddle.net/Nikkoin/kf9up7Lo/99/embedded/result/?accentColor=73C382"
                    allowfullscreen="allowfullscreen" frameborder="0"></iframe>
                    <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div id="email" class="overlay">
                <div class="overlay-content">
                    <h1>Templete de E-mail - Comunicado interno e Assinatura</h1>

                    <iframe src="//jsfiddle.net/Nikkoin/u2ys4omn/32/embedded/result,html/light/?accentColor=73C382"
                        allowfullscreen="allowfullscreen" frameborder="0"></iframe>
                    <div class="elementoinvisivel"></div>
                    <div class="iframemenor">
                        <iframe src="//jsfiddle.net/Nikkoin/uLze7wgs/33/embedded/result,html/light/?accentColor=73C382"
                            allowfullscreen="allowfullscreen" frameborder="0"></iframe>
                    </div>
                    <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div id="ilustracoes" class="section">
                <h2 data-link="/portifolio#ilustracoes"><i class="fa-solid fa-link"></i> Ilustrações</h2>
            </div>

            <div class="portfolio-container">
                <!-- Imagem 1 -->
                <div class="portfolio-item" data-overlay="mariana">
                    <img src="/images/i/i3.png" alt="Imagem 1" class="portfolio-image">
                </div>
                <!-- Imagem 2 -->
                <div class="portfolio-item" data-overlay="varios">
                    <img src="/images/i/i2.png" alt="Imagem 2" class="portfolio-image">
                </div>
                <!-- Imagem 3 -->
                <div class="portfolio-item" data-overlay="humanoide">
                    <img src="/images/i/i5.png" alt="Imagem 3" class="portfolio-image">
                </div>
                <!-- Imagem 4 -->
                <div class="portfolio-item" data-overlay="manga">
                    <img src="/images/i/i4.png" alt="Imagem 3" class="portfolio-image">
                </div>
            </div>

            <!-- Overlays -->
            <div id="mariana" class="overlay">
                <div class="overlay-content">
                    <div class="imgs-design"><img src="/images/i/i3.5.png"></div>
                    
                    <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div id="varios" class="overlay">
                <div class="overlay-content">
                    <div class="imgs-design"><img src="/images/i/i1.5.png"></div>
                    <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div id="humanoide" class="overlay">
                <div class="overlay-content">
                    <div class="imgs-design"><img src="/images/i/i5.5.png"></div>
                    <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <div id="manga" class="overlay">
                <div class="overlay-content">
                    <div class="imgs-design"><img src="/images/i/i4.5.png"></div>
                    <button class="close-overlay"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
        </main>

        <?php include('../code/footer.php'); ?>
        <!-- Use ../ para voltar um nível -->

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="../code/script.js"></script>
</body>


</html>