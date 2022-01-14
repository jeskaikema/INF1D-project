<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "../templates/head.php"; ?>
</head>
<body>
	<div id="login-wrapper">
		<div class="login-container">
			<div class="img-container">
				<img src="../img/nhlstenden-logo-login.png" alt="nhlstenden logo">
			</div>
			<form action="../src/login.php" method="POST">
				<div class="error"><?php echo (isset($_GET['error']) && $_GET['error'] == "emptyError") ? "Vul een emailadres in" : ""; ?></div>
				<div class="error"><?php echo (isset($_GET['error']) && $_GET['error'] == "invalidEmail") ? "Vul een geldig emailadres in" : ""; ?></div>
				<div class="error"><?php echo (isset($_GET['error']) && $_GET['error'] == "nonexistantUser") ? "De gebruiker bestaat niet" : ""; ?></div>
				<input type="text" name="email" id="email" placeholder="emailadres"><br>
				<input type="submit" name="submit" value="inloggen">
			</form>
		</div>
	</div>	
</body>
</html>
