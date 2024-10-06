<?php

// Configurações do banco de dados
define('DB_HOST', 'localhost');  // Geralmente 'localhost'
define('DB_USER', 'root');       // Nome de usuário do banco de dados
define('DB_PASS', '');           // Senha do banco de dados
define('DB_NAME', 'teste');      // Nome do banco de dados

// Cria a conexão com o banco de dados
$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Verifica se há erros na conexão
if ($con->connect_error) {
    die("Falha na conexão com o banco de dados: " . $con->connect_error);
}

// Se quiser fechar a conexão em algum momento no código, use:
// $con->close();
