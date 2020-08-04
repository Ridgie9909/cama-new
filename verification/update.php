<?php
    session_start();
    require '../config/database.php';
    error_reporting(-1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");
    
    // include '../config/connection.php';
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $active = strval($_POST['active']);
    $hash = strval($_SESSION['hash']);
    try {
        $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $query = "UPDATE users SET username='$name',password='$password',active='$active' , email='$email', password='$password' WHERE '$hash'";
        unset($_SESSION['loggedin']);
        $_SESSION['loggedin'] = $name;
        $stmt = $connect->exec($query);
        echo "not the update page";
        
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    
    echo ('<script>window.location.href="../home.php";</script>');
    ?>