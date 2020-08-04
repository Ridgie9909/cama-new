<?php
session_start();
$hash = $_SESSION['loggedin'];

    try {
        $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "DELETE FROM `users` WHERE '$hash'";
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    // echo ('<script>window.location.href="../login.php";</script>');
    
    ?>