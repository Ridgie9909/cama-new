<?php
	require 'config.php';
	if(empty($_SESSION['name']))
		header('Location: login.php');
?>

<html>
<head><title>Home</title></head>
<body>

			<?php
				if(isset($errMsg)){
					echo $errMsg;
				}
			?>
			
				Welcome <?php echo $_SESSION['name']; ?> <br>
				<a href="update.php">Update</a> <br>
				<a href="logout.php">Logout</a>
</body>
</html>
