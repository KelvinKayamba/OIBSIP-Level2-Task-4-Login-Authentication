<?php

session_start();

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!--MAIN CSS-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="welcome">
        <?php echo "<h1>Welcome -" .$_SESSION['username']. "</h1>"; ?> <br>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>