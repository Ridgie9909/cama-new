<!DOCTYPE html>

<html>
<head>
    <title>Document</title>
</head>
<?php
    session_start();
    $link = "http://localhost:3000/cama-new/update_password.php/$ ";
    require './config/database.php';
    
    
    $email = trim($_POST["email"]);

        
        try {
            $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $request = "SELECT `email` FROM `users` WHERE `email` = '".$_POST['email']."'";
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
                
                $to = $email;
                $subject = 'Camagru password reset';
                $message = 'Dear user,
                
                
                Recently a request was submitted to reset a password for your account. 
                If this was a mistake, just ignore this email and nothing will happen.
                To reset your password, visit the following link: '.$link.'
                
                
                Regards,
                Camagru staff';  
                
                $headers = 'From:noreply@Camagru_staff.com' . "\r\n"; 
                mail($to, $subject, $message, $headers);
                // echo ('<script>window.location.href="../cama-new/login.php";</script>');   
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }

        }
        else if($stmt->rowCount() < 0){
            echo "<script type='text/javascript'>alert('This email does not exist')</script>";

        }
        
    
        ?>
<body>
<h1>Your password reset request has been processed please check your email</h1>

<p>To return to the login page please click <a href="login.php">here</a></p>
<p>To return to the Sign up page please click <a href="signup.php">here</a></p>
    
</body>
</html>