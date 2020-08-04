<?php
include "../config/connection.php"; 
$war = 'this is a test';
echo $wars;
?>
# include the connection in header to manage whos logged in or not by making a second header to act as whenn you're locked out.
<html>

<body>
<h1>Camagru</h1>
<ul>
    <a class="home" href="home.php">Home</a>
    <a class="gallery" href="gallery.php">Gallery</a>
    <a class="Forgotpass" href="webcam.php">Camera</a>
    <a class="Logout" href="logout.php">Log Out</a>
    <a class="Forgotpass" href="forgot_password.php">Forgot-Password</a>

  </ul>

</body>
</html>