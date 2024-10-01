<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Nikkoin Design'; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="alternate icon" href="/images/icone.ico">
    <link rel="icon" href="/images/icone.svg">
    <link rel="stylesheet" href="/code/style.css">
</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-23BZZMMJMP"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'G-23BZZMMJMP');
</script>

<nav>
    <div class="nav_container">
        <a target="_blank" href="#" class="logo"><img src="/images/nh_logo.svg"></a>
        <div class="nav_links">
            <a href="/" class="<?php echo ($_SERVER['REQUEST_URI'] == '/' ? 'ativa' : ''); ?>">Início</a>
            <a href="/portifolio" class="<?php echo ($_SERVER['REQUEST_URI'] == '/portifolio' ? 'ativa' : ''); ?>">Portifólio</a>
            <a target="_blank" href="/seja-veloz" class="<?php echo ($_SERVER['REQUEST_URI'] == '/seja-veloz' ? 'ativa' : ''); ?>">Seja Veloz</a>
        </div>
    </div>
</nav>
