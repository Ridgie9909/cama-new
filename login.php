<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
</head>
    <?php
        session_start();
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: home.php");
            exit;
        }
        require_once './config/database.php';
        
        try {
            $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = trim($_POST["name"]);
            $password = md5($_POST['password']);
            
            $request = "SELECT id, username, active FROM users WHERE username='".$username."' AND password='".$password."' AND active='1'";
            // echo $request;
            $stmt = $connect->prepare($request);
            $stmt->execute();
            if ($stmt->rowCount() > 0){
                $msg = "Login successful!";
                echo $msg;

                $_SESSION['loggedin'] = $username;
                header('location:home.php') ;
            }
            else{
                echo "incorrect details, please try again!";
            }
            
            // $stmt = $connect->execute($request);
        }
    ?>
        
<body>
    <h1>Login here</h1>
        <p>Acess your amazing WeThinkCode memories <b>here</b> or go be part of the code army <a href="signup.php"><b>here</b></a><br />
        <p>Please login</p>
        <form action="" method="post">
            <label for="name">Username:</label>
            <input type="text" name="name" value="" required/>
            <label for="password">Password:</label>
            <input type="password" name="password" value="" required autocomplete ="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                <br><br>
            <input type="submit" value="Login" />
        </form>
</body>
</html>       