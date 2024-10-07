<?php
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        header("Location: /");
        exit(); // Certifique-se de sempre usar exit() após o redirecionamento
    }
?>
