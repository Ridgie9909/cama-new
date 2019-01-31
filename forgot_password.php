<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset password</title>
</head>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = trim($_POST["email"]);
    }
    ?>
<body>
    <form method="post" action="e_pass.php">
        <label for="email" >Email:</label>
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="example@example.com">
             <input  type="submit" name="Submit">
    </form>     
    
</body>
</html>