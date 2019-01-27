<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A-page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
<?php
    require_once '../config/database.php';
    
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        $email = $_GET['email'];
        $hash = $_GET['hash'];
        $search = "SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
        if (rowCount($search) > 0){
            echo 'found';
        }
        
        if ($search >= 0){
            $act = "UPDATE users SET active='1 WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
            
            echo "Your account has been activated, you can now login.";
        }
        
        $conn->prepare($search)->execute();
        echo "$email";
        echo "$hash";
    }
    // echo "BS";
    // echo ($search); 
    // print_r($_GET);
    ?>
    <h1>success</h1>
</body>
</html>