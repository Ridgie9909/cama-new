<!DOCTYPE html>
<html>

<body>

    <?php
    session_start();
    include "header.php";
    include "footer.php";

    require_once './config/database.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    try {
        $connect = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    $hash = strval($_SESSION['hash']);
    $request = "SELECT id, username FROM users WHERE '$hash'";
    $stmt = $connect->prepare($request);
    $stmt->execute();
    $things = $stmt->fetch();
    echo "Hello, ".$things['username']." this is your account page.";
    ?>

    <form action="./verification/update.php" method="post">
                <label for="name" >Username:</label>
                <input type="text" name="name" value="" required title=''>
                <br>
                <label for="email">Email:</label>
                <input type="email" name="email" value=""  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="example@example.com"/>
                <br>
                <label for="password">Password:</label>
                <input type="password" name="password" value="" required  autocomplete ="off" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
                <br>
                <label for="active">Active:</label> 
                <input type="password" name="active" value="" required  autocomplete ="off" pattern="{1,}" title="set account activity to 1 or 0"/>
                <br>
                <input type="submit" value="Make changes" />
        </form> 


    <p>Did you forget your password? Click<a href="forgot_password.php"><b> here</b></a> !</p>
    <p><a href="logout.php">logout</a></p>
    <p><a href="delete.php">Delete Account</a></p>

</body>
</html>