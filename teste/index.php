<!DOCTYPE html>
<html lang="pt">

<head>
    <link rel="icon" type="image/svg+xml" href="/seja-veloz/imgs/iconesv.svg">
    <link rel="alternate icon" href="images/iconesv.ico">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seja Veloz</title>
    <link rel="stylesheet" href="style.css?v=1.3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<!-- Google tag (gtag.js) 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-23BZZMMJMP"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag('js', new Date());

  gtag('config', 'G-23BZZMMJMP');
</script>-->

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

<footer>
    <p>&copy; 2024 <img class="loguinho" src="/images/nh_logo.svg"> Nikkoin Design - Todos os direitos reservados. | <a
            href="/seja-veloz/privacy/">Termos de Serviço e
            Política de Privacidade</a></p>
</footer>

</html>