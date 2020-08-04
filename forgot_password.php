<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset password</title>
    <?php 
        include 'header.php';
        include 'footer.php';
        require_once './config/database.php';        
    ?>
</head>
    <?php
    try{
        $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $request = "SELECT email FROM users WHERE email='$email' AND active='1'";
        $stmt = $connect->exec($request);
        $stmt-fetch();
        echo $stmt['email'];
    }
    catch(PDOException $e){
        echo "Failed to connect: " . $e->getMessage() . " ";
    }
    if ($stmt->rowCount() > 0){
        $email = trim($_POST["email"]);
    }
    else{
        echo "bro you're not on the system or you can't spell";
    }
?>
<body>
    <form method="post" action="change_password.php">
        <label for="email" >Email:</label>
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="example@example.com">
             <input  type="submit" name="Submit">
    </form>     
    
</body>
</html>