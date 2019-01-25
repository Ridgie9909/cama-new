<?php

require 'database.php';

try {
    $conn = new PDO("mysql:host=".dbhost."; ", dbuser, dbpass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>