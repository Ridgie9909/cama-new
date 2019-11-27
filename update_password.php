<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Reset</title>
</head>
<?php

    require './config/database.php';
    
    
    try {
        $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (md5($_POST['cpassword']) === $_GET['password']){
            echo "New password can't be the same as the old one";
        }
        else{
            if ($_POST['password'] === $_POST['cpassword'])
            {
            $password = md5($_POST['cpassword']);
            $request = "UPDATE `users` SET `password`=$password, WHERE $id";
            // $connect->prepare($request)->execute();
            // echo ('<script>window.location.href="../cama-new/login.php";</script>');    

        }
    }

    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
<body>
    <h1>Type in your new password</h1>
    <p>You have a chance to change your password on forget this one!</p>
    <form method="post" action="">
    <label for="password">New Password:</label>
        <input type="password" name="password"/>
    <label for="cpassword">Confirm Password:</label>
        <input type="password" name="cpassword"/><br><br>
        <input type="submit" value="Submit" />
        </form>
</body>
</html>