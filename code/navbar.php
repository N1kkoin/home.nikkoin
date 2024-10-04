<?php
function isActive($path) {
    return ($_SERVER['REQUEST_URI'] == $path || $_SERVER['REQUEST_URI'] == rtrim($path, '/') . '/') ? 'ativa' : '';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title : 'Nikkoin Design'; ?></title>
    
    <!-- Meta description dinâmico -->
    <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : 'Nikkoin Design - Portfólio de Nicole Heguy, Designer Gráfico, Web Designer e Front-end Developer.'; ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="alternate icon" href="/images/icone.ico">
    <link rel="icon" href="/images/icone.svg">
    <link rel="stylesheet" href="/code/style.css?v=1.23">
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
        <a target="_blank" href="#" class="logo"><img src="/images/nh_logo.svg" alt="Ícone NH" loading="lazy" ></a>

        <div class="nav_links">
            <a href="/" class="<?php echo isActive('/'); ?>">Início</a>
            <a href="/portifolio" class="<?php echo isActive('/portifolio'); ?>">Portifólio</a>
            <a target="_blank" href="/seja-veloz" class="<?php echo isActive('/seja-veloz'); ?>">Seja Veloz</a>
        </div>


    </div>
</nav>