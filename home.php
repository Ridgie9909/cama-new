<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cama-Home</title>
</head>
<body>
    <?php
    session_start();
        echo $_SESSION['loggedin'];
    ?>
    <p>Did you forget your password? Click<a href="forgot_password.php"><b> here</b></a> !</p>
    <p><a href="logout.php">logout</a></p>
</body>
</html>