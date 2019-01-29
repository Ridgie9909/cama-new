<?php
    session_start();
    require '../config/database.php';

    // echo 123;
    echo filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $name = $_POST['name'];
            $email = $_POST['email'];

            if (strlen($password) < 6 && preg_match('`[A-Z]`',$password) && preg_match('`[a-z]`',$password) && preg_match('`[0-9]`',$password)){
                $password = md5($_POST['password']);
            }
            else{
                echo "dude the password needs to be better either needs a number or a special2";
            }
        
        
        $hash = md5( rand(0,1000) );
        
        try {
            $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "INSERT INTO users (username, password, email, hash) VALUES('$name', '$password', '$email', '$hash')";
            $stmt = $connect->exec($query);
            $to = $email;
            $subject = 'Camagru verification';
            $message = 'Thanks for signing up!
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
    }
    // echo ('<script>window.location.href="../login.php";</script>');    
    ?>
    