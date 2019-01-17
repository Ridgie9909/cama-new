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
        $pdo = "CREATE TABLE users(
            `id`INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `username` VARCHAR(50) NOT NULL UNIQUE,
            `email` VARCHAR(50) NOT NULL UNIQUE,
            `password` VARCHAR (255) NOT NULL,
            `date_created` DATETIME DEFAULT CURRENT_TIMESTAMP())";

        $conn->prepare($pdo)->execute();
        echo "done boi";
        }
        catch(PDOException $e){
            echo "Failed to connect: " . $e->getMessage();
        }


$conn->prepare($pdo)->execute();
    echo ". Table successfuly created";
?>