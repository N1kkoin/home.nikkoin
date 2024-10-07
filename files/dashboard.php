<?php
//require auth_session.php file on all user panel pages
require("auth_session.php");

    $title = "Área do cliente - NH";
    $meta_description = "Área de clientes - Nikkoin Design"; 

    include('code/navbar.php'); 
?>

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