<?php
$title = "Seja Veloz";

include('code/navbar.php');
?>

<body>
   
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
                        href='https://nikkoin.itch.io/seja-veloz'>
                        <img class="googleplay" src="images/badge_itchio.svg">
                    </a>
                    <p>PC & Mobile - Free</p>
                </div>
            </div>
        </div>

        <div id="sobre" class="accordion-content">
            <h2 class="titulo2">Histórico</h2>
            <div class="accordion-item">
                <div class="item-header">
                    <h4 class="item-question">
                        Criação
                    </h4>
                    <div class="item-icon">
                        <i class="fa-solid fa-caret-down"></i>
                    </div>
                </div>
                <div class="item-content">
                    <div class="separador paragrafos">
                        <p><b>Seja Veloz</b> foi um jogo que decidi criar de forma completamente aleatória em julho de 2023. Eu estava começando a brincar com HTML, CSS e JS e pensei: por que não começar um projeto? Um projeto sempre me ajudou a aprender. Foi então que a ideia de criar um jogo simples, usando JavaScript, começou a tomar forma. Com a ajuda do ChatGPT, aprendi várias coisas, sem ele, provavelmente nem teria conseguido finalizar o projeto.
                        </p>
                        <p>Agora, pensando bem, acho que a inspiração veio de um jogo que vi há um tempo, que lembrava uma Visual Novel. Ele era bem mais complexo do que eu imaginava ser possível fazer só com front-end, mas me fez acreditar que eu poderia criar algo legal. Lembrei também de um jogo onde você precisava digitar rapidamente uma frase em inglês para medir sua velocidade de digitação. Foi aí que surgiu a ideia de criar um jogo de digitar rápido. Mas, ao invés de fazer uma corrida para ver quem escreve mais rápido uma frase, pensei: <i>"Por que não criar algo onde você tem que escrever o máximo de palavras que puder sem deixar o tempo acabar?"</i>. E assim, as mecânicas foram aparecendo e evoluindo naturalmente.

                        </p>
                        <p>Uma das partes mais desafiadoras, mas também uma das mais legais, foi implementar o Leaderboard. Usei o Firebase DB do Google, e foi uma sensação incrível ver essa funcionalidade pronta e funcionando corretamente.
                        </p>
                        <p>Agora, vou ser sincera: sempre tive dificuldades com português. Minha escrita não é a melhor, e acho que essa dificuldade me motivou a criar um jogo que incentiva as pessoas a escrever e, ao mesmo tempo, se divertir. O intuito do Seja Veloz é justamente esse: praticar a escrita de forma criativa, sem depender das sugestões automáticas que usamos o tempo todo.
                        </p>
                        <p>Eu não sou a melhor no Seja Veloz. Muitos já me superaram com quantidades absurdas de palavras, e mesmo sendo competitiva, essa é uma das raras vezes em que fico feliz por ver outros serem melhores do que eu. Isso me lembra quando surgem speedruns e outros tipos de pessoas determinadas jogando e se dedicando a um jogo.
                        </p>
                        <p>Depois que finalizei a versão web do jogo, algo curioso aconteceu. Durante o evento da Faculdade Aberta da FAM em outubro de 2023, onde centenas de alunos do ensino médio jogaram o Seja Veloz, percebi o quanto o jogo era útil. Enquanto alguns ficavam grudados no computador, descobri que muitos mal sabiam digitar em um teclado. A geração que cresceu com celulares (final da Geração Z e início da Geração Alpha) simplesmente não tinha essa familiaridade com computadores. Isso (junto com a sugestão que me deram), em maio de 2024 me inspirou a criar a versão para Android e lançar na Google Play usando o Apache Cordova.
                        </p>
                        <p>Uma das regras do jogo é que você não pode usar as sugestões automáticas de palavras nem copiar e colar. Tem que digitar tudo manualmente. Isso, além de ser um desafio, acaba ajudando as pessoas a memorizar e aprender a escrever as palavras corretamente.
                        </p>
                        <p>Atualmente, o jogo está na versão 2.0 com três idiomas (português, inglês e espanhol), três níveis de dificuldade (Modo Normal, Desafiador e Perfeccionista) e um Leaderboard para quem quiser competir. Se não for sua praia, dá para desativar essa opção nas configurações.
                        </p>
                        <p>O jogo está disponível gratuitamente no <a target="_blank" href="https://nikkoin.itch.io/seja-veloz"><b>Itch.io</b></a>. Já a versão para <a target="_blank" href="https://play.google.com/store/apps/details?id=nikkoin.sejaveloz&pcampaignid=web_share&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1"><b>Android</b></a> custa R$ 1,29, para quem quiser e puder apoiar e contribuir com o desenvolvimento do jogo.</p>
                        <p style="font-size: small;color: #77779e;text-align: right;">Atualizado em 11/09/2024</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-content"> <!--https://codepen.io/code-bracket/pen/PoELVPY -->

            <div class="accordion-item">
                <div class="item-header">
                    <h4 class="item-question">
                        2023
                    </h4>
                    <div class="item-icon">
                        <i class="fa-solid fa-caret-down"></i>
                    </div>
                </div>
                <div class="item-content">
                    <div class="sejaveloz separador">
                        <div class="imagem-item1">Ver 1.8 - outubro 2023 </div>
                        <div class="imagem-item2">Ver 1.9.7 - maio 2024 </div>
                        <img class="imagem-item3 imgs-paraovelay" src="images/fotos/FA-ver1.png" alt="Imagem">
                        <img class="imagem-item4 imgs-paraovelay" src="images/fotos/FA-ver2.png" alt="Imagem">
                        <img class="imagem-item5 imgs-paraovelay" src="images/fotos/launch-ver1.png" alt="Imagem">
                        <img class="imagem-item6 imgs-paraovelay" src="images/fotos/launch-ver2.png" alt="Imagem">
                    </div>
                    <div class="paragrafos">
                        <p>Em outubro de 2023, durante a Faculdade Aberta na <a target="blank_"
                                href="https://www.instagram.com/famamericana/">@famericana</a>, tive a oportunidade de
                            apresentar meu jogo como uma das atividades para os jovens do ensino médio.</p>
                        <p>Eles foram meus <i>beta testers não oficiais</i>, proporcionando uma experiência valiosa.
                            Observando de perto, percebi padrões interessantes, o que me levou a implementar melhorias sutis
                            na
                            época, as quais mantive até hoje:</p>
                        <ul>
                            <li>Ao clicar para iniciar o jogo, a digitação começa automaticamente, sem a necessidade de
                                clicar na
                                caixa de escrita;</li>
                            <li>Adicionei um aviso intuitivo para evitar teclar equivocadamente no "Enter", o que poderia
                                prejudicar a entrada no leaderboard;</li>
                            <li>Instruções claras são exibidas no início da página, eliminando a incerteza de como
                                começar;</li>
                            <li>Para tornar o jogo mais equilibrado, palavras com mais de seis caracteres só aparecem após
                                os
                                primeiros 25 segundos.</li>
                        </ul>
                        <p>Essas pequenas mudanças, mesmo que aparentemente insignificantes, transformaram a experiência
                            do
                            jogo, tornando-a mais intuitiva e divertida. Além disso, observei que jogadores extremamente
                            rápidos
                            encontravam um novo desafio de resistência em vez de tempo, o que me inspirou a criar o Modo
                            Perfeccionista.</p>
                    </div>
                    <div class="parent">
                        <div class="div1"> <img class="img-segundaria1 imgs-paraovelay" src="/images/fe/seja_veloz/fe2.jpg" alt="Imagem"></div>
                        <div class="div2"><img class="img-segundaria3 imgs-paraovelay" src="/images/fe/seja_veloz/fe1.jpg" alt="Imagem"> </div>
                        <div class="div3"><img class="img-segundaria2 imgs-paraovelay" src="/images/fe/seja_veloz/fe4.jpg" alt="Imagem">  </div>
                        <div class="div4"> <img class="img-segundaria4 imgs-paraovelay" src="/images/fe/seja_veloz/fe3.jpg" alt="Imagem"></div>
                        <div class="div5"> <img class="img-segundaria5 imgs-paraovelay" src="/images/fe/seja_veloz/fe5.jpg" alt="Imagem"></div>
                        <div class="div6"> <img class="img-segundaria6 imgs-paraovelay" src="/images/fe/seja_veloz/fe6.jpg" alt="Imagem"> </div>
                        <div class="div7">  <iframe class="videosv"
                    src="https://www.youtube.com/embed/jYAtoA7WSho?&modestbranding=1&modestbranding=1&playsinline=1&playlist=jYAtoA7WSho"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>
                    </div>
                    <p style="font-size: small;color: #77779e;text-align: right;">Atualizado em 25/05/2024</p>

                </div>
            </div>
        </div>



        <!-- Overlay container -->
        <div id="overlay" class="overlay">
            <span class="close">&times;</span>
            <img class="overlay-content" id="overlay-img" src="">
        </div>
    </main>

<?php include('code/footer.php'); ?>