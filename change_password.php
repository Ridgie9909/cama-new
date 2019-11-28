<?php
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
    
    $password = $_POST['cpassword'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    try {
        $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $something = "SELECT hash FROM users WHERE email = '".$_POST['email']."'";
        $data = $connect->prepare($something)->execute();
    


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