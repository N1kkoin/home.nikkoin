<?php
//require auth_session.php file on all user panel pages
require("auth_session.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="dashboard_user-page">
        <div>
            <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
            <p>You are in user dashboard page.</p>
            <p><a href="logout">Logout</a></p>
        </div>
    </div>
</body>

</html>