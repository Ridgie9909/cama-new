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
    require_once '../config/connection.php';
    
    print_r($_GET);
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        $email = $_GET['email'];
        $hash = $_GET['hash'];
        $search = "SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'";
        $match = $search;
        echo $search;
        if ($search >= 0){
            echo "123";
        }

        $conn->prepare($search)->execute();
        echo "$email";
        echo "$hash";
    }
?>
    <h1>success</h1>
</body>
</html>