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
                require_once './config/database.php';

        
            // print_r($_GET);
            if (isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['password']) && !empty($_POST['password'])){
                $username = $_POST['name'];
                $password = md5($_POST['password']);}
            try{
                $conn = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $search = "SELECT username, password, active FROM users WHERE username='".$username."' AND password='".$password."' AND active='1'";
                $stmt = $conn->execute($search);
                if ($stmt->fetchColum() > 0){
                    
                }
                // $match = fetchColumn($search);
                // if ($search > 0){
                    $msg = 'login complete! thank you';
                //     echo $msg;
                // }
                // else{
                    $msg = 'login failed! please make sure that you enter the correct details and that you have activated your account.';
                    echo $msg;
                // }
                // $match = fetchAll($search);
                    
                
            }
            catch(PDOException $e){
                    echo "Failed to connect: " . $e->getMessage() . " ";
                }
            // if ($match == 1){
            //     // session_start();
            //     $_SESSION['loggedin'];
                
                
            // }
            echo $msg;
            ?>
<body>
    <h1>Login here</h1>
        <p>Acess your amazing WeThinkCode memories <b>here</b> or go be part of the code army <a href="signup.php">here</a><br />
        <p>Please login</p>
        <form action="" method="post">
            <label for="name">Username:</label>
            <input type="text" name="name" value="" required/>
            <label for="password">Password:</label>
            <input type="password" name="password" value="" required/>
                <br><br>
            <input type="submit" value="Login" />
        </form>
</body>
</html>       