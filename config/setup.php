<?php
    require 'database.php';
    
    
    try{
        $conn = new PDO("mysql:host=".dbhost."; ", dbuser, dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $request = "CREATE DATABASE IF NOT EXISTS camagru_";
        $conn->prepare($request)->execute();
        }
    
    catch(PDOException $e){
        echo "Failed to connect: " . $e->getMessage() . " ";
    }
    try{
        $conn = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Successfully connected to database";
        $pdo = "CREATE TABLE `users` (
            `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            `username` VARCHAR( 32 )UNIQUE NOT NULL ,
            `password` VARCHAR( 32 ) NOT NULL ,
            `email` VARCHAR(32) UNIQUE NOT NULL ,
            `hash` VARCHAR( 32 ) NOT NULL ,
            `active` INT( 1 ) NOT NULL DEFAULT '0'
            ) ENGINE = MYISAM ";

        $pdo1 = "CREATE TABLE `Gallery` (
            `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `userid` INT(100) NOT NULL,
            `username` VARCHAR(30),
            `photo` MEDIUMTEXT NOT NULL,
            `likes` MEDIUMINT NOT NULL DEFAULT '0'
        )";

        $pdo2 = "CREATE TABLE `images` (
            id INT PRIMARY KEY AUTO_INCREMENT,
            photo LONGBLOB NOT NULL,
            userid VARCHAR(255) NOT NULL,
            likes INT DEFAULT 0)";
        
        $pdo3 = "CREATE TABLE Comments (
            `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            `photoid` INT(100) NOT NULL,
            `username` VARCHAR(30) NOT NULL,
            `comment` VARCHAR(300)
        )";

        $conn->prepare($pdo)->execute();
        $conn->prepare($pdo1)->execute();
        $conn->prepare($pdo2)->execute();
        $conn->prepare($pdo3)->exectute();
        // echo "done boi";
        }
        catch(PDOException $e){
            echo "Failed to connect: " . $e->getMessage() . " ";
        }


$conn->prepare($pdo)->execute();
    // echo ". Table successfuly created";
?>