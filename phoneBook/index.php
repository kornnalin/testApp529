<html>
<link rel="stylesheet" href="style.css">
<body>
<h1 style="color:blue">Personal Phonebook Management Service</h1>
<h2>SIGN IN</h2>
<form  action="check_login.php" method="post">
<p>Username:</p><input id = username type="text" name="username">
<p>Password:</p><input id = password type="password" name="password"></br>
<input type="checkbox" name="checkbox" >Save username in the machine<br>
<input type="submit" name="signOn" value ="SIGN ON"></input>
</form>
<a href="newUser.php"><button type="button" name="newUser" >New User</button></a>
</body>
</html>
