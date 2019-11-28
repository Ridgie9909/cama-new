<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Reset</title>
</head>

<body>
    <h1>Type in your new password</h1>
    <p>You have a chance to change your password on forget this one!</p>
    <form method="post" action="change_password.php">
    <label for="email">Email:</label>
        <input type="email" name=email/>
    <label for="password">New Password:</label>
        <input type="password" name="password"/>
    <label for="cpassword">Confirm Password:</label>
        <input type="password" name="cpassword"/><br><br>
        <input type="submit" value="Submit" />
        </form>
</body>
</html>