<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="registration_page">
<?php
    require('db.php');

    // Quando o formulário for submetido, insira os valores no banco de dados.
    if (isset($_POST['username'])) {
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = $_POST['password'];
        $create_datetime = date("Y-m-d H:i:s");

        // Crie o hash da senha usando password_hash
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Preparar a consulta SQL para evitar SQL Injection
        $query = "INSERT INTO `users` (username, password, email, create_datetime) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $username, $password_hash, $email, $create_datetime);

        // Executar a consulta e verificar o resultado
        if (mysqli_stmt_execute($stmt)) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>There was an error in the registration process.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>try again</a>.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="email" class="login-input" name="email" placeholder="Email Address" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" name="submit" value="Register" class="login-button" />
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>
<?php
    }
?>

</div>
</body>
</html>
