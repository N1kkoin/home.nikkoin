<?php
$title = "Nikkoin Design";
$meta_description = "Nikkoin Design - Site de Nicole Heguy, Designer Gráfico, Web Designer e Front-end Developer.";

include('code/navbar.php');
?>

<body class="body_index">
    <div>
        <header class="header_index">
            <div class="fundodiferenciado">
                <div class="contatos">
                    <a class="animacao" href="mailto:contato@nikkoin.art" title="Email" data-delay="400"><i
                            class="far fa-envelope"></i></a>
                    <a class="animacao" href="https://www.instagram.com/nikkoin_/" title="Instagram" data-delay="500"><i
                            class="fab fa-instagram"></i></a>
                    <a class="animacao" href="https://www.linkedin.com/in/nicoleheguy/" title="Linkedin"
                        data-delay="600"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <img class="nikkoinlogo animacao" src="images/Marca_NH.svg" alt="Logo Nikkoin Design" loading="lazy"
                    data-delay="0">
                <p class="escrevendo animacao" id="typewriter" data-delay="800">Nikkon</p>
            </div>
        </header>

        <!--<div class="fundodiferenciado-main">
            eve
        </div>-->
        <main class="main_index">
            <div class="frase">
                <i class="fa-solid fa-quote-left"></i> <span>Tudo o que nos rodeia reflete a visão de um
                    designer.</span> <i class="fa-solid fa-quote-right"></i>
            </div>
            <div class="citacao"><i class="fa-solid fa-minus"></i> Nicole Heguy <span style=" color: #c2d7dd;">(eu
                    :)</span>
            </div>

            </br>
            <div class="imagem-texto-sobre">
                <div class="imagem-container ">
                    <img src="images/eu.jpg" alt="Foto minha no RD Summit 2023" loading="lazy">
                    <div class="legenda">Foto não está editada - RD Summit 2023</div>
                </div>
                <div>
                    <p>
                        Me chamo Nicole Heguy. Iniciei minha carreira como Designer Gráfico e, atualmente,
                        também trabalho como Web Designer e Dev Front-end (HTML, CSS e JS). Amo resolver problemas, um
                        dos
                        motivos que me levaram a me interessar por UI/UX Design.
                    </p>
                    <p>
                        Em todos os meus trabalhos, tento pensar em como o usuário receberá as informações. Mesmo
                        acompanhando
                        as tendências do mercado, minha intenção é criar interfaces e artes <b>atemporais</b>, que
                        permaneçam
                        relevantes e funcionais, até que o cliente deseje renovar o design por uma nova visão, e não por
                        obsolescência.
                    </p>
                    <p>
                        Atualmente, como freelancer, realizo diversos tipos de projetos, com foco em desenvolver sites
                        responsivos personalizados em HTML, CSS e JS. Também ofereço serviços de hospedagem e manutenção
                        para os
                        sites que desenvolvo. Estou aberta a outros tipos de trabalhos conforme a necessidade dos
                        clientes.
                    </p>

                </div>

            </div>

            <section class="graficos">
                <div>
                    <h2><i class="fa-solid fa-code"></i> Desenvolvimento</h2>
                    <div class="wrap">
                        <div class="barGraph">
                            <ul class="graph">
                                <div class="graph-barBack">
                                    <li class="graph-bar" data-value="70">
                                        <span class="graph-legend"><i class="fa-brands fa-html5"></i> HTML5</span>
                                    </li>
                                </div>
                                <div class="graph-barBack">
                                    <li class="graph-bar" data-value="80">
                                        <span class="graph-legend"><i class="fa-brands fa-css3"></i> CSS3</span>
                                    </li>
                                </div>
                                <div class="graph-barBack">
                                    <li class="graph-bar" data-value="50">
                                        <span class="graph-legend"><i class="fa-brands fa-js"></i> JavaScript</span>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div>
                    <h2><i class="fa-solid fa-paintbrush"></i> Design</h2>
                    <div class="wrap">
                        <div class="barGraph">
                            <ul class="graph">
                                <div class="graph-barBack">
                                    <li class="graph-bar" data-value="75">
                                        <span class="graph-legend">UI/UX Design</span>
                                    </li>
                                </div>
                                <div class="graph-barBack">
                                    <li class="graph-bar" data-value="85">
                                        <span class="graph-legend">Affinity Designer</span>
                                    </li>
                                </div>
                                <div class="graph-barBack">
                                    <li class="graph-bar" data-value="90">
                                        <span class="graph-legend">Adobe Photoshop</span>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>


            <section class="section_interesses">

                <h2>Interesses</h2>
                <div class="interesses">
                    <div>
                        <div class="img_container"><img src="images/icons/games.svg" loading="lazy" alt="Ícone jogos">
                        </div>
                        <span>Jogos</span>
                    </div>
                    <div>
                        <div class="img_container"><img style="width: 55px;" src="images/icons/arte.svg"
                                alt="Ícone arte" loading="lazy">
                        </div>
                        <span>Desenhar</span>
                    </div>
                    <div>
                        <div class="img_container"> <img src="images/icons/book.svg" alt="Ícone aprender"
                                loading="lazy"></div>
                        <span>Aprender</span>
                    </div>
                    <div>
                        <div class="img_container"> <img src="images/icons/cat.svg" loading="lazy" alt="Ícone gatos">
                        </div>
                        <span>Gatos :3</span>
                    </div>

                </div>
            </section>


        </main>
        <section class="depoisdo_main">
            <h2>Conheça um pouco do meu trabalho</h2>
            <div class="work-grid">
                <div class="work-item">
                    <a href="/portifolio#design-grafico">
                        <img src="images/dg/coworking/coworkingfam_3.png" alt="Imagem de Design Gráfico" loading="lazy">
                        <h3>Design Gráfico</h3>
                    </a>
                </div>
                <div class="work-item">
                    <a href="/portifolio#front-end">
                        <img src="images/fe/infofamimg.png" alt="Imagem de Web Design e Front-end" loading="lazy">
                        <h3>Web Design | Front-end</h3>
                    </a>
                </div>
                <div class="work-item">
                    <a href="/portifolio#ilustracoes">
                        <img src="images\i\luz.jpg" alt="Imagem de Ilustração" loading="lazy">
                        <h3>Ilustrações</h3>
                    </a>
                </div>
            </div>
        </section>

        <?php include('code/footer.php'); ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="code/script.js?v=1.1"></script>
</body>

</html>