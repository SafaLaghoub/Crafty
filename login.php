<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="css/loginStyle.css">
</head>
<body>
     <form action="login2.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Passwrod</label>
     	<input type="password" name="email" placeholder="Password"><br>

     	<button type="submit">Login</button>
     </form>
</body>
</html>