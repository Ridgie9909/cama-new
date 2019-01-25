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

            if (!empty($_POST)){
                if (isset($_POST['username']) && isset($_POST['password'])){
                    $conn = new PDO("mysql:host=".dbhost."; dbname=".dbname, dbuser, dbpass);
                    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
                    $stmt->bind_param('s', $_POST['username']);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $user = $result->fetch_object();

                    if (password_verify($_POST['password'], $user->password)){
                        $_SESSION['loggedin'] = $user->ID;
                    }
                }
            }
            echo ('<script>window.location.href="./home.php";</script>');    

        ?>
<body>
    <h1>Login here</h1>
        <p>Acess your amazing WeThinkCode memories <b>here</b> or go be part of the code army <a href="signup.php">here</a><br />
        <p>Please login</p>
        <form action="" method="post">
            <label for="name">Username:</label>
            <input type="text" name="name" value="" />
            <label for="password">Password:</label>
            <input type="password" name="password" value="" />
                <br><br>
            <input type="submit" value="Login" />
        </form>
</body>
</html>