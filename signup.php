<?php
// session_start();

require './config/connection.php';

if (isset($_POST['signup'])){
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    // $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindValue(':username', $username);
    
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($row['num'] > 0){
        die('That username already exists!');
    }

    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);

    $result = $stmt->execute();

    if($results){
        echo "Welcome to Camagru, please login in.";
    }
}
?>

<!DOCTYPE html>
    <head>
    </head>
    <body>
    <h1>Sign Up</h1>
        <form action="signup.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username"><br>
            <label for="password">Password</label>
            <input type="text" id="password" name="password"><br>
            <input type="submit" name="signup" value="signup"></button>
            </form>
    </body>
            </html>
 