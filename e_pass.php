<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<?php
    session_start();
    $link = "http://localhost:8080/cama-new/update_password.php";
    require './config/database.php';
    
    $email = trim($_POST["email"]);

        
        try {
            $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = "SELECT email, active FROM users WHERE active='1'";
            $stmt = $connect->prepare($request);
            $stmt->execute();
            // echo $stmt->rowCount();
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        if ($stmt->rowCount() > 0){
            try {
                $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo 51;
                $to = $email;
                $subject = 'Camagru password reset';
                $message = 'Dear user,
                
                
                Recently a request was submitted to reset the password for your account. 
                If this was a mistake, just ignore this email and nothing will happen.
                To reset your password, visit the following link: '.$link.'
                
                
                Regards,
                Camagru staff';  
                
                $headers = 'From:noreply@Camagru_staff.com' . "\r\n"; 
                mail($to, $subject, $message, $headers);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        else{
            echo "bro you're not on the system or you can't spell";
        }
    
        ?>
<body>
    <h1>Processing... </h1>
    <p>You can check your email for the reset link or go back to the login page <b><a href="login.php">here</a></b> and try to remember your old password</p>
</body>
</html>