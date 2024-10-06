<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require('db.php');
    
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        $username = trim($_REQUEST['username']);
        $email = trim($_REQUEST['email']);
        $password = $_REQUEST['password'];
        $create_datetime = date("Y-m-d H:i:s");

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='form'>
                  <h3>Invalid email format.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>try again</a>.</p>
                  </div>";
            exit;
        }

        // Check if username or email already exists
        $checkQuery = "SELECT * FROM `usuarios` WHERE username = ? OR email = ?";
        $stmt = mysqli_prepare($con, $checkQuery);
        mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo "<div class='form'>
                  <h3>Username or Email already exists.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>try again</a>.</p>
                  </div>";
            exit;
        }

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the insert statement
        $query = "INSERT INTO `usuarios` (username, password, email, create_datetime) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 'ssss', $username, $hashedPassword, $email, $create_datetime);
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="email" class="login-input" name="email" placeholder="Email Address" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>
<?php
    }
?>
</body>
</html>
