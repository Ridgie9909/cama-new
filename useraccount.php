<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<?php
    session_start();
    $link = "http://localhost:8080/cama-new/verification/verify.php?email='.$email.'&hash='.$hash.''";
    
    
    $to = $email;
            $subject = 'Camagru password reset';
            $message = 'Dear '.$name.', 
            <br>Recently a request was submitted to reset a password for your account. 
            <br>If this was a mistake, just ignore this email and nothing will happen.
            <br>To reset your password, visit the following link: <a href="'.$link.'">Reset Password</a>
            <br>
            <br>
            Regards,
            Camagru staff

            Please click this link to activate your account:
            http://localhost:8080/cama-new/verification/verify.php?email='.$email.'&hash='.$hash.'';  
            
            $headers = 'From:noreply@Camagru_staff.com' . "\r\n"; 
            mail($to, $subject, $message, $headers); 
?>
<body>
    
</body>
</html>