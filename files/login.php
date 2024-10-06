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
    
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = trim($_REQUEST['username']);
        $password = $_REQUEST['password'];

        // Prepare statement to prevent SQL injection
        $query = "SELECT password FROM `usuarios` WHERE username=?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $hashedPassword);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Check if the user exists and verify the password
        if ($hashedPassword && password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;
            // Regenerate session ID to prevent session fixation attacks
            session_regenerate_id(true);
            // Redirect to user dashboard page
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username or Password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required autofocus />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" value="Login" name="submit" class="login-button" />
        <p class="link">Don't have an account? <a href="registration.php">Register Now</a></p>
    </form>
<?php
    }
?>
</body>
</html>
