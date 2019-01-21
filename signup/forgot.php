<?php
	require 'config.php';

	if(isset($_POST['forgotpass'])) {
		$errMsg = '';

		$secretpin = $_POST['secretpin'];

		if(empty($secretpin))
			$errMsg = 'Please enter your secret pin to view your password.';

		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT password, secretpin FROM users WHERE secretpin = :secretpin');
				$stmt->execute(array(
					':secretpin' => $secretpin
					));
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				if($secretpin == $data['secretpin']) {
					$viewpass = 'Your password is: ' . $data['password'] . '<br><a href="login.php">Login Now</a>';
				}
				else {
					$errMsg = 'Sercet pin not matched.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>

<html>
<head><title>Forgot Password</title></head>
<body>
	
			<?php
				if(isset($errMsg)){
					echo $errMsg;
				}
			?>
			<?php
				if(isset($viewpass)){
					echo $viewpass;
				}
			?>
				<form action="" method="post">
					<input type="text" name="secretpin" placeholder="Secret Pin" autocomplete="off" class="box"/><br /><br />
					<input type="submit" name='forgotpass' value="Check" class='submit'/><br />
				</form>
</body>
</html>
