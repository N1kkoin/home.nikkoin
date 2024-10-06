<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login / Registration</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <div class="main_page">
        <?php
        require('db.php');
        session_start();

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
                    header("Location: dashboard.php");
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

            $password_hash = password_hash($password, PASSWORD_DEFAULT);


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
                    <button class="toggle-button active" onclick="toggleForms('login')">Login</button>
                    <button class="toggle-button" onclick="toggleForms('register')">Criar conta</button>
                </div>

                <h1 class="login-title">Login</h1>
                <!-- Input com ícone para o Username -->
                <div class="input-with-icon">
                    <i class="fas fa-user"></i> <!-- Ícone de usuário -->
                    <input type="text" class="login-input" name="login_username" placeholder="Username" required
                        autofocus />
                </div>

                <!-- Input com ícone para o Password -->
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i> <!-- Ícone de cadeado -->
                    <input type="password" class="login-input" name="login_password" placeholder="Password" required />
                </div>

                <button type="submit" value="Login" class="login-button"> Login</button>
            </form>
        </div>

        <!-- Formulário de Registro -->
        <div id="register-form" class="form-container">
            <form class="form" action="" method="post">

                <!-- Botões para alternar entre os formulários -->
                <div class="toggle-buttons">
                    <button class="toggle-button" onclick="toggleForms('login')">Login</button>
                    <button class="toggle-button active" onclick="toggleForms('register')">Criar conta</button>
                </div>

                <h1 class="login-title">Registration</h1>
                <!-- Input com ícone para o Username -->
                <div class="input-with-icon">
                    <i class="fas fa-user"></i> <!-- Ícone de usuário -->
                    <input type="text" class="login-input" name="register_username" placeholder="Username" required />
                </div>

                <!-- Input com ícone para o Email -->
                <div class="input-with-icon">
                    <i class="fas fa-envelope"></i> <!-- Ícone de envelope -->
                    <input type="email" class="login-input" name="register_email" placeholder="Email Address"
                        required />
                </div>

                <!-- Input com ícone para o Password -->
                <div class="input-with-icon">
                    <i class="fas fa-lock"></i> <!-- Ícone de cadeado -->
                    <input type="password" class="login-input" name="register_password" placeholder="Password"
                        required />
                </div>
                <button type="submit" value="Register" class="login-button"> Register</button>
            </form>
        </div>

    </div>

    <script src="script.js"></script>

    </script>
</body>

</html>