<?php

?>
<!DOCTYPE html>
<html>
<head>
<title>Poll System</title>
</head>
<body>
	<form action="../../controller/login.php" method="POST">
		<input type="text" id="username" name="username" />
		<input type="password" id="password" name="password" />
		<button type="submit">Login</button>
	</form>
	<hr/>
	<form action ="../../controller/signup.php" method="POST">
		<label>Full Name: </label>
		<input type="text" id="fullname" name="fullname" /><br/>
		<label>Username: </label>
		<input type="text" id="su-username" name="username" /><br/>
		<label>Password: </label>
		<input type="password" id="su-password" name="password" /><br/>
		<button type="submit">Sign Up</button>
	</form>
</body>
</html>