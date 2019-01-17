<?php

require './database.php';

try{
    $conn = new PDO("mysql:host=$servername;dbname=camagru_", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Successfully connected to database";
}
catch(PDOException $e){
    echo "Failed to connect: " . $e->getMessage();
}
?>