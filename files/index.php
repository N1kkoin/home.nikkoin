<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Registration</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <div class="main_page">
        <?php

        require('db.php');
        session_start();

        // Verifique se o usuário já está logado
        if (isset($_SESSION['username'])) {
            header("Location: dashboard_user.php");
            exit();
        }

        // Processamento do Login
        if (isset($_POST['login_username'])) {
            $username = mysqli_real_escape_string($con, $_POST['login_username']);
            $password = $_POST['login_password'];

            $query = "SELECT * FROM `users` WHERE username = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) == 1) {
                $user = mysqli_fetch_assoc($result);

                if (password_verify($password, $user['password'])) {
                    $_SESSION['username'] = $username;
                    header("Location: dashboard_user.php");
                    exit();
                } else {
                    echo "<div class='form'>
                      <h3>Incorrect Username/password.</h3><br/>
                      <p class='link'>Click here to <a href=''>Login</a> again.</p>
                      </div>";
                }
            } else {
                echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href=''>Login</a> again.</p>
                  </div>";
            }
        }

        // Definir o fuso horário para o horário de Brasília (Brasil)
        date_default_timezone_set('America/Sao_Paulo');

        // Processamento do Registro
        if (isset($_POST['register_username'])) {
            $username = mysqli_real_escape_string($con, $_POST['register_username']);
            $email = mysqli_real_escape_string($con, $_POST['register_email']);
            $password = $_POST['register_password'];
            $create_datetime = date("Y-m-d H:i:s");

            // Verificar se o username ou email já está em uso
            $check_query = "SELECT * FROM `users` WHERE username = ? OR email = ?";
            $stmt = mysqli_prepare($con, $check_query);
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                // Se já existir um usuário com o mesmo username ou email
                echo "<div class='registro-erro'>
              <h3>O nome de usuário ou e-mail já está em uso. Tente outro.</h3>
              </div>";
            } else {
                // Se não existir, prossiga com o registro
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $query = "INSERT INTO `users` (username, password, email, create_datetime) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_prepare($con, $query);
                mysqli_stmt_bind_param($stmt, "ssss", $username, $password_hash, $email, $create_datetime);

                if (mysqli_stmt_execute($stmt)) {
                    echo "<div class='registro-sucesso'>
                  <h3>Você se registrou com sucesso.</h3>
                  </div>";
                } else {
                    echo "<div class='registro-erro'>
                  <h3>Houve um erro no processo de registro.</h3><br/>
                  </div>";
                }
            }
        }
        ?>

        <!-- Formulário de Login -->
        <div id="login-form" class="form-container active">

            <form class="form" method="post" name="login">

                <!-- Botões para alternar entre os formulários -->
                <div class="toggle-buttons">
                    <button class="toggle-button active" onclick="toggleForms(event, 'login')">Login</button>
                    <button class="toggle-button" onclick="toggleForms(event, 'register')">Criar conta</button>
                </div>

                <!-- Input com ícone para o Username -->
                <div class="input-with-icon">
                    <i class="fas fa-user"></i> <!-- Ícone de usuário -->
                    <input type="text" class="login-input" name="login_username" placeholder="Usuário" required
                        autofocus />
                </div>

                <!-- Input com ícone para o Password -->
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i> <!-- Ícone de cadeado -->
                    <input type="password" class="login-input" name="login_password" placeholder="Senha" required />
                </div>

                <button type="submit" value="Login" class="login-button"> Login</button>
            </form>
        </div>

        <!-- Formulário de Registro -->
        <div id="register-form" class="form-container">
            <form class="form" action="" method="post">

                <!-- Botões para alternar entre os formulários -->
                <div class="toggle-buttons">
                    <button class="toggle-button" onclick="toggleForms(event, 'login')">Login</button>
                    <button class="toggle-button active" onclick="toggleForms(event, 'register')">Criar conta</button>

                </div>

                <!-- Input com ícone para o Username -->
                <div class="input-with-icon">
                    <i class="fas fa-user"></i> <!-- Ícone de usuário -->
                    <input type="text" class="login-input" name="register_username" placeholder="Usuário" required />
                </div>

                <!-- Input com ícone para o Email -->
                <div class="input-with-icon">
                    <i class="fas fa-envelope"></i> <!-- Ícone de envelope -->
                    <input type="email" class="login-input" name="register_email" placeholder="E-mail" required />
                </div>

                <!-- Input com ícone para o Password -->
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i> <!-- Ícone de cadeado -->
                    <input type="password" class="login-input" name="register_password" placeholder="Senha" required />
                </div>
                <button type="submit" value="Register" class="login-button"> Criar Conta</button>
            </form>
        </div>

    </div>

    <script src="script.js"></script>

    </script>
</body>

</html>