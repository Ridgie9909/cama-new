<?php
    require './database.php';

    try{
        $conn = new PDO($servername, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $request = "CREATE DATABASE IF NOT EXISTS camagru_";
        $conn->prepare($request)->execute();

        echo "success Db made. ";
        }

        catch(PDOException $e){
            echo "Failed to connect: " . $e->getMessage();
        }

    try{
        $conn = new PDO("$servername;dbname=camagru_", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Successfully connected to database";
        $pdo = "CREATE TABLE `users` (
            `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            `username` VARCHAR( 32 ) NOT NULL ,
            `password` VARCHAR( 32 ) NOT NULL ,
            `email` TEXT NOT NULL ,
            `hash` VARCHAR( 32 ) NOT NULL ,
            `active` INT( 1 ) NOT NULL DEFAULT '0'
            ) ENGINE = MYISAM";

        $conn->prepare($pdo)->execute();
        echo "done boi";
        }
        catch(PDOException $e){
            echo "Failed to connect: " . $e->getMessage();
        }


$conn->prepare($pdo)->execute();
    echo ". Table successfuly created";
?>