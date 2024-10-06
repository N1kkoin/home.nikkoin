<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    session_start();

    // Configurações de segurança
    $max_attempts = 5; // Número máximo de tentativas
    $timeout_duration = 300; // Duração do bloqueio em segundos

    // Se o usuário está temporariamente bloqueado
    if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] >= $max_attempts) {
        if (time() < $_SESSION['timeout']) {
            echo "<div class='form'>
                  <h3>Too many login attempts. Please try again later.</h3>
                  </div>";
            exit();
        } else {
            // Reinicia as tentativas de login após o timeout
            unset($_SESSION['login_attempts']);
            unset($_SESSION['timeout']);
        }
    }

    // Quando o formulário é enviado
    if (isset($_POST['username'])) {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Prepara e executa a consulta
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        // Verifica se o usuário existe
        if ($row = mysqli_fetch_assoc($result)) {
            // Verifica a senha
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $username;
                session_regenerate_id(); // Regenera o ID da sessão
                // Redireciona para a página do dashboard do usuário
                header("Location: dashboard_user.php");
                exit();
            } else {
                $_SESSION['login_attempts'] = ($_SESSION['login_attempts'] ?? 0) + 1;
                echo "<div class='form'>
                      <h3>Incorrect Username/password.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                      </div>";
            }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }

        // Define o tempo de bloqueio se o número máximo de tentativas for atingido
        if ($_SESSION['login_attempts'] >= $max_attempts) {
            $_SESSION['timeout'] = time() + $timeout_duration;
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" value="Login" name="submit" class="login-button" />
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
    </form>
<?php
    }
?>
</body>
</html>
