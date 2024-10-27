<?php
$title = "Seja Veloz";

include('code/navbar.php');
?>

<body>
    <nav>
        <div class="navbar">
            <a><img src="images/iconesv.svg" alt="Logo Seja Veloz"></a>
            <div>
                <a href="/seja-veloz">Inicio</a>
                <a href="">Sobre</a>
                <a class="jogarbotao" href="#jogar">Jogar</a>

            </div>
        </div>
    </nav>
    <header><img src="images/logocomtag_seja_veloz.svg"></header>

    <main>
        <div class="container-jogo">
            <h2 class="titulojogo">Seja mais rapido que um gato nesse jogo de digitação!</h2>
            <div>
                <div class="grid-container">
                    <div class="grid-item comojogar">
                        <div class="contentdogrid">
                            <h3>Como jogar</h3>
                            <p>Selecione a língua que deseja jogar e clique em iniciar. Não deixe o tempo acabar, está na hora de
                                testar o quão agil você é! :)</p>
                        </div>
                    </div>

                    <div class="grid-item modonormal">
                        <div class="contentdogrid">
                            <h3> <i class='fa-regular fa-circle-dot'></i> Modo Normal</h3>
                            <p>Em cada acerto <span class='modo-normal'></span> segundos.</p>
                        </div>
                    </div>

                    <div class="grid-item mododesafiador">
                        <div class="contentdogrid">
                            <h3><i class='fa-solid fa-circle-minus'></i> Modo Desafiador</h3>
                            <ul>
                                <li>Letra errada -1 ponto;</li>
                                <li>Em cada acerto <span class='modo-desafiador'></span> segundos.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="grid-item modoperfeccionista">
                        <div class="contentdogrid">
                            <h3><i class='fa-solid fa-circle-dot'></i> Modo Perfeccionista</h3>
                            <ul>
                                <li>Não erre nenhuma letra;</li>
                                <li>Em cada acerto <span class='modo-perfeccionista'></span> segundos.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <p style="text-align: center;">O intuito do jogo é aprender/praticar a escrever sem as sugestões automáticas, que
                estamos sempre acostumados no dia a dia, de forma criativa e desafiadora.</p>

            <div id="jogar" class="jogos_container">
                <div class="svgcomtexto">
                    <a alt='Disponível no Google Play'
                        href='https://play.google.com/store/apps/details?id=nikkoin.sejaveloz&pcampaignid=web_share&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'>
                        <img class="googleplay" src="images/google-play-badge.svg">
                    </a>
                    <p>Android - R$ 1,29</p>
                </div>
                <div class="svgcomtexto">
                    <a alt='Disponível no Itch.io'
                        href='https://itch.io/embed/2196535'>
                        <img class="googleplay" src="images/badge_itchio.svg">
                    </a>
                    <p>PC & Mobile - Free</p>
                </div>
            </div>
        </div>
    </main>
    <script src="script.js"></script>
</body>

<?php include('code/footer.php'); ?>