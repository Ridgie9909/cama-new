<?php
    // require '../config/connection.php';
?>
<html>

<head>
    <title>CAMA-REGISTRATION</title>
</head>
<?php
if (isset($_POST['username']) && !empty($_POST['username']) AND isset($_POST['email']) && !empty($_POST['email'])){
    $name = mysql_escape_string($_POST['username']);
    $email = mysql_escape_string($_POST['email']);

    if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
        $msg = 'The email you have entered is invalid, please try again.';
    }
    else{
        $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been sent to your email.';
    }
}
?>

<body>
    <h1>Camagru</h1>
    <h3>Share your WeThinkCode memories.</h3>

    <?php
        if(isset($msg)){
            echo $msg;
        }
    ?>

    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" value="" />
        <label for="email">Email:</label>
        <input type="text" name="email" value="" /><br /><br />

        <input type="submit" value="Sign up" />
    </form>

</body>
</html>