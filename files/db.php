<?php

// Configurações do banco de dados
define('DB_HOST', 'localhost');  // Geralmente é 'localhost' no Hostinger
define('DB_USER', 'u575812263_nick');  // Nome de usuário que você criou
define('DB_PASS', "Lunemo121'");    // Senha que você definiu
define('DB_NAME', 'u575812263_nikkoinart');  // Nome do banco de dados que você criou

// Cria a conexão com o banco de dados
$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
