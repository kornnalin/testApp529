<html>
<link rel="stylesheet" href="style.css">
<body>
	<form>
	<h1>New User Sunscription</h1>
	Full Name : <input type="text" name="full_name"></br>
	User : <input type="text" name="user"></br>
	Password : <input type="password" name="pass1"></br>
	(Re-type)Password : <input type="password" name="pass2"></br>
	<input type="submit" name="apply" value="APPLY"></br>
	</form>
	<a href="newUser.php" ><button type="button" name="cancel">CANCEL</button></a>

</body>
</html>

<?php
include("connectDB.php");
$fullName = $_GET['full_name'];
$user = $_GET['user'];
$pass1 = $_GET['pass1'];
$pass2 = $_GET['pass2'];
if($_GET){
	if($pass1 == $pass2){
		//insert into DB
		$sql = "INSERT INTO login (user,pwd,name) VALUES ('".$user."','".$pass1."','".$fullName."');";
		if($connect->query($sql) === TRUE){
			#echo "New record create successfully";
		}else{
			echo "Error:".$sql."<br>".$connect->error;
		}
	}
}
$connect->close();
?>
