<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<?php
    session_start();
    $link = "http://localhost:8080/cama-new/forgot_password.php";
    require './config/database.php';
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
                mail("ridgedube7@gmail.com", $subject, $message, $headers); 
}
    catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
<body>
    
</body>
</html>