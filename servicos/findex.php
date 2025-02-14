<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nikkoin Portifólio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="alternate icon" href="../images/icone.ico"> <!-- Ajuste o caminho -->
    <link rel="icon" href="../images/icone.svg"> <!-- Ajuste o caminho -->
    <link rel="stylesheet" href="../code/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.4/swiper-bundle.css">
    <style>
        .pricing__table {
            display: flex;
            margin: 30px 30px 90px 30px;
        }

        @media (max-width: 640px) {
            .pricing__table {
                margin: 60px 15px;
            }
        }

        .pricing__table .pt__title {
            max-width: 25%;
            flex: 1;
        }

        @media (max-width: 991px) {
            .pricing__table .pt__title {
                max-width: 50%;
            }
        }

        .pricing__table .pt__title .pt__title__wrap {
            position: relative;
            flex: 1;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            padding: 24px 0;
            font-size: 1.375rem;
            line-height: 1.4;
            text-align: center;
        }

        @media (max-width: 991px) {
            .pricing__table .pt__title .pt__title__wrap {
                font-size: 1.3rem;
            }
        }

        .pricing__table .pt__title .pt__title__wrap .pt__row {
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-size: 18px;
            font-weight: 500;
            min-height: 70px;
            padding-left: 16px;
            padding-right: 16px;
            border-bottom: 1px solid rgba(73, 72, 74, 0.1);
            text-align: left;
            align-items: flex-start;
        }

        .pricing__table .pt__title .pt__title__wrap .pt__row:first-child {
            border-bottom: 0;
        }

        @media (max-width: 991px) {
            .pricing__table .pt__title .pt__title__wrap .pt__row {
                padding-left: 32px;
                padding-right: 32px;
            }
        }

        @media (max-width: 640px) {
            .pricing__table .pt__title .pt__title__wrap .pt__row {
                padding-left: 0;
                padding-right: 15px;
                font-size: 14px;
            }
        }

        .pricing__table .pt__option {
            position: relative;
            flex: 1;
        }

        @media (max-width: 991px) {
            .pricing__table .pt__option {
                max-width: 50%;
            }
        }

        .pricing__table .pt__option .pt__option__mobile__nav {
            position: absolute;
            z-index: 1;
            top: 0%;
            bottom: auto;
            left: 0%;
            right: auto;
            display: none;
            justify-content: space-between;
            width: 100%;
        }

        @media (max-width: 991px) {
            .pricing__table .pt__option .pt__option__mobile__nav {
                z-index: 2;
                top: 40px;
                display: flex;
                grid-column-gap: 8px;
                grid-row-gap: 8px;
                justify-content: space-between;
                width: 110%;
                margin-left: -5%;
            }
        }

        .pricing__table .pt__option .pt__option__mobile__nav .mobile__nav__btn {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            color: #fff;
            border-radius: 50%;
            background-color: #0061FF;
            transition: 0.25s;
        }

        .pricing__table .pt__option .pt__option__mobile__nav .mobile__nav__btn:hover {
            background-color: #0057E6;
        }

        .pricing__table .pt__option .pt__option__mobile__nav .mobile__nav__btn.swiper-button-disabled {
            background-color: #c0beb6;
            pointer-events: none;
        }

        .pricing__table .pt__option .pt__option__mobile__nav .mobile__nav__btn svg {
            width: 16px;
            color: #faf7f2;
        }

        @media (max-width: 991px) {
            .pricing__table .pt__option .pt__option__slider {
                overflow: hidden;
            }
        }

        .pricing__table .pt__option .pt__option__item {
            flex: 1;
            width: auto;
            max-width: 33.3333%;
            margin-right: 0;
        }

        @media (max-width: 991px) {
            .pricing__table .pt__option .pt__option__item {
                width: 100%;
                max-width: none;
                flex: none;
            }
        }

        .pricing__table .pt__option .pt__option__item .pt__item {
            position: relative;
            display: flex;
            flex: 1;
            flex-direction: column;
            justify-content: flex-start;
            margin-bottom: 1em;
            overflow: hidden;
            border-radius: 24px;
        }

        @media (max-width: 991px) {
            .pricing__table .pt__option .pt__option__item .pt__item {
                border: 1px solid #ddd;
                background-color: #fafafa;
            }
        }

        .pricing__table .pt__option .pt__option__item .pt__item.recommend {
            background-color: rgba(0, 97, 255, 0.15);
            border: 1px solid #0061FF;
        }

        .pricing__table .pt__option .pt__option__item .pt__item .pt__item__wrap {
            flex: 1;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            text-align: center;
            padding: 24px 0 0 0;
            font-size: 1.375rem;
            line-height: 1.4;
            position: relative;
        }

        @media (max-width: 991px) {
            .pricing__table .pt__option .pt__option__item .pt__item .pt__item__wrap {
                font-size: 1.3rem;
            }
        }

        .pricing__table .pt__option .pt__option__item .pt__item .pt__row {
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 70px;
            padding-left: 16px;
            padding-right: 16px;
            font-size: 16px;
            font-weight: 300;
            border-bottom: 1px solid rgba(73, 72, 74, 0.1);
        }

        .pricing__table .pt__option .pt__option__item .pt__item .pt__row:first-child {
            border-bottom: 0;
            font-size: 20px;
            font-weight: 600;
        }

        .pricing__table .pt__option .pt__option__item .pt__item .pt__row:last-child {
            display: inline-flex;
            padding: 20px 15px;
            align-items: center;
            border-bottom: 0;
        }

        .pricing__table .pt__option .pt__option__item .pt__item .pt__row:last-child a {
            padding: 15px 30px;
            font-weight: 500;
            text-transform: uppercase;
            text-decoration: none;
            color: #fff;
            border-radius: 10px;
            background-color: #0061FF;
            transition: 0.25s;
        }

        .pricing__table .pt__option .pt__option__item .pt__item .pt__row:last-child a:hover {
            background-color: #0057E6;
        }

        @media (max-width: 576px) {
            .pricing__table .pt__option .pt__option__item .pt__item .pt__row:last-child a {
                padding: 12px 20px;
            }
        }

        @media (max-width: 640px) {
            .pricing__table .pt__option .pt__option__item .pt__item .pt__row {
                font-size: 14px;
                font-weight: 400;
            }
        }
    </style>
</head>


<body class="body_portifolio">
    <?php include('../code/navbar.php'); ?>
    <!-- Use ../ para voltar um nível -->

    <div>
        <header class="header_portifolio">
            <h1>Serviços</h1>
            <p>Qual é o portifólio que deseja ver?</p>
        </header>

        <main class="main_portifolio">
            <div id="design-grafico" class="section">
                <h2 data-link="/servicos#"><i class="fa-solid fa-link"></i> Planos de Hosteamento</h2>
            </div>
            <!-- INICIO FORMULARIO BOTAO PAGBANK: NAO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
            <form action="https://pagseguro.uol.com.br/pre-approvals/request.html" method="post">
                <input type="hidden" name="code" value="C7AACFF592929E37746E1F983E2E8704" />
                <input type="hidden" name="iot" value="button" />
                <input type="image"
                    src="https://stc.pagseguro.uol.com.br/public/img/botoes/assinaturas/95x45-contratar-preto.gif"
                    name="submit" alt="Pague com PagBank - É rápido, grátis e seguro!" width="95" height="45" />
            </form>
            <!-- FINAL FORMULARIO BOTAO PAGBANK -->

            <!--LINK PARA COLOCAE NO BOTÂO COMEÇO -->
            http://pag.ae/7-Y275Vzr
            <!--LINK PARA COLOCAE NO BOTÂO FIM -->

            <!-- INICIO FORMULARIO BOTAO PAGBANK: NAO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
<form action="https://pagseguro.uol.com.br/pre-approvals/request.html" method="post">
<input type="hidden" name="code" value="C7AACFF592929E37746E1F983E2E8704" />
<input type="hidden" name="iot" value="button" />
<input type="image" src="https://stc.pagseguro.uol.com.br/public/img/botoes/assinaturas/120x53-contratar-roxo.gif" name="submit" alt="Pague com PagBank - É rápido, grátis e seguro!" width="120" height="53" />
</form>
<!-- FINAL FORMULARIO BOTAO PAGBANK -->
            <h1>Responsive Pricing Table, Table Columns in Desktop, Slider in Mobile</h1>

            <div class="pricing__table">
                <div class="pt__title">
                    <div class="pt__title__wrap">
                        <div class="pt__row"></div>
                        <div class="pt__row">Monthly Email Sends</div>
                        <div class="pt__row">Users</div>
                        <div class="pt__row">Audiences</div>
                        <div class="pt__row">24/7 Email & Chat Support</div>
                        <div class="pt__row">Pre-built Email Templates</div>
                        <div class="pt__row">300+ Integrations</div>
                        <div class="pt__row">Reporting & Analytics</div>
                        <div class="pt__row">Forms & Landing Pages</div>
                        <div class="pt__row">Creative Assistant</div>
                    </div>
                </div>
                <div class="pt__option">
                    <div class="pt__option__mobile__nav">
                        <a id="navBtnLeft" href="#" class="mobile__nav__btn">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22.1538 11.9819H1.81972" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.9863 22.1535L1.82043 11.9865L11.9863 1.81946" stroke="currentColor"
                                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <a id="navBtnRight" href="#" class="mobile__nav__btn">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.81934 11.9819H22.1534" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.9863 22.1535L22.1522 11.9865L11.9863 1.81946" stroke="currentColor"
                                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <div class="pt__option__slider swiper" id="pricingTableSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide pt__option__item">
                                <div class="pt__item recommend">
                                    <div class="pt__item__wrap">
                                        <div class="pt__row">Premium</div>
                                        <div class="pt__row">150,000</div>
                                        <div class="pt__row">Unlimited</div>
                                        <div class="pt__row">Unlimited</div>
                                        <div class="pt__row">Phone & Priority Support</div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row">
                                            <a href="https://pag.ae/7-Y275Vzr">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide pt__option__item">
                                <div class="pt__item">
                                    <div class="pt__item__wrap">
                                        <div class="pt__row">Standard</div>
                                        <div class="pt__row">16,000</div>
                                        <div class="pt__row">5 Seats</div>
                                        <div class="pt__row">5 Audiences</div>
                                        <div class="pt__row">24/7 Email & Chat Support</div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row">
                                            <a href="">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide pt__option__item">
                                <div class="pt__item">
                                    <div class="pt__item__wrap">
                                        <div class="pt__row">Essentials</div>
                                        <div class="pt__row">5,000</div>
                                        <div class="pt__row">3 Seats</div>
                                        <div class="pt__row">3 Audiences</div>
                                        <div class="pt__row">24/7 Email & Chat Support</div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row">Limited</div>
                                        <div class="pt__row"><i class="fa-solid fa-check"></i></div>
                                        <div class="pt__row">Limited</div>
                                        <div class="pt__row">
                                            <a href="">Purchase Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include('../code/footer.php'); ?>
        <!-- Use ../ para voltar um nível -->

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/jquery-anyimagecomparisonslider-plugin'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.4/swiper-bundle.min.js"></script>
    <script src="../code/script.js"></script>
    <script>
        // Pricing table - mobile only slider
        var init = false;
        var pricingCardSwiper;
        var pricingLoanSwiper
        function swiperCard() {
            if (window.innerWidth <= 991) {
                if (!init) {
                    init = true;
                    pricingCardSwiper = new Swiper("#pricingTableSlider", {
                        slidesPerView: "auto",
                        spaceBetween: 5,
                        grabCursor: true,
                        keyboard: true,
                        autoHeight: false,
                        navigation: {
                            nextEl: "#navBtnRight",
                            prevEl: "#navBtnLeft",
                        },
                    });
                }
            } else if (init) {
                pricingCardSwiper.destroy();
                init = false;
            }
        }
        swiperCard();
        window.addEventListener("resize", swiperCard);
    </script>
</body>


</html>