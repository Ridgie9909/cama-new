<?php
ini_set('display_errors', 1);

// require './config/database.php';
    
    // $conn = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
    // $request = "SELECT `email` FROM `users` WHERE `email` = '".$_POST['email']."'";
    
    

    // $password = $_POST['password'];
    
    

    // if($something === 1)
    // $stmt = $conn->prepare("UPDATE `users` SET `password` = '$hashed_password' WHERE `email` = '".$_POST['email']."'");
    // $stmt->execute();
    // $stmt = null;
    
    // try{
    //     $conn = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
    //     $result = "SELECT * FROM users";
    //     $stmt = $conn->prepare($result)->execute();
    //     echo $stmt["hash"];
    //     // if($hash < 0){
    //     //     echo "your account doesn't seem to work.";
    //     // }
    // }
    // catch(PDOException $e){
    //     echo $e;
    // }
    

?>

<?php

    require './config/database.php';
    // include '../config/connection.php';
    
    // $password = $_POST['cpassword'];
    // $password = $_POST['password'];
    $email = $_POST['email'];
    
    
    
    try {
        $conn = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $stmt1 = "SELECT * FROM users WHERE email='$email'";
        // $stmt1 = "UPDATE `users` SET `username`='something',`password`='bruh',`email`='this',`hash`='bruh',`active`='2' WHERE `email` = '$email'";



        // $data = $conn->prepare($stmt);
        $var = $conn->query($stmt1);
        
        // $data->bindParam(1, $email);



        // echo $data;
        // $data->execute();
        
        $row = $var->fetch(PDO::FETCH_ASSOC);
        $hash = $row['hash'];
        echo $row;
        echo "what";


        // $email = $_POST['email'];
	    // $query = "SELECT * FROM users WHERE email=?";
	    // $result = $conn->query($query);
        // $row = $result->fetch(PDO::FETCH_ASSOC);
        
        // echo ('<script>window.location.href="../cama-new/login.php";</script>');    
        // header("location: login.php");

    //     if (md5($_POST['cpassword']) === $_GET['password']){
    //         echo "New password can't be the same as the old one";
    //     }
    //     else{
    //         if ($_POST['password'] === $_POST['cpassword'])
    //         {
    //         $request = "UPDATE `users` SET `password`=$password, WHERE $id";
    //         "UPDATE `users` SET `password`= $cpassword WHERE '".$hash."'";
    //         // $connect->prepare($request)->execute();
    //         // echo ('<script>window.location.href="../cama-new/login.php";</script>');    

    //     }
    // }

    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

?>