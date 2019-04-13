<?php
    session_start();
    require '../config/database.php';

    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
        
        $hash = md5( rand(0,1000) );
        
        try {
            $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            #place insert query into an if statement.
            $query = "INSERT INTO users (username, password, email, hash) VALUES('$name', '$password', '$email', '$hash')";
            $stmt = $connect->exec($query);
            $to = $email;
            $subject = 'Camagru verification';
            $message = 'Thanks for signing up '.$name.'!
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
            
            Username: '.$name.'

            Please click this link to activate your account:
            http://localhost:8080/cama-new/verification/verify.php?email='.$email.'&hash='.$hash.'';  
            
            $headers = 'From:noreply@Camagru_staff.com' . "\r\n"; 
            mail($to, $subject, $message, $headers); 
            
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    
    echo ('<script>window.location.href="../login.php";</script>');    
    ?>
    