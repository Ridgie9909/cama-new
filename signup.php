<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>V-Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
</head>
<body>

    <h1>Hello guest welcome to camagru</h1>

        <h3>Sign up here</h3>
            <p>Begin sharing your WeThinkCode memories today</p>

            <form action="./verification/insert.php" method="post">
                <label for="name" >Name:</label>
                <input type="text" name="name" value="" required />
                <label for="email">Email:</label>
                <input type="email" name="email" value=""  required/>
                <label for="password">Password:</label>
                <input type="password" name="password" value="" required/>
                <br>
                <br>
                <input type="submit" value="Sign up" />
            </form> 

            <br>
            <p>if you already have a camgru account login <b><a href="login.php">here</a></b></p>
</body>   

</html>