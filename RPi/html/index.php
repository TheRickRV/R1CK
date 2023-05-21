	<html>
	
	<head>
	<link rel="stylesheet" href="styles_login.css" type="text/css"/>
	<title>Login page</title>
	</head>
	
	<body>

	<h1>AUTHENTICATION REQUIRED</h1>

	<form method="post" action="mainpage.php">                                     <!-- this is the form that sends values of username and password to the mainpage.php file -->
	
	<p>Name: <input type="text" name="username" /> </p>
	<p>Password: <input type="password" name="password" /> </p>
	
	<p><input type="submit" value="Sign in" /> </p> 
	
	</form>
	

	</body>
	</html>