<?php
session_start();
include("connectDB.php");
if($_SESSION['login']=="OK"){
  $user = $_SESSION['user'];
  $name = $_SESSION['name'];
  $pass = $_SESSION['pass'];
?>
 <html>
   <head><meta charset="utf-8"></head>
   <link rel="stylesheet" href="style.css"
   <body>
     username : <?php echo $user;?>(<?php echo $name; ?>)
     <a href="chang_password.php"><button class="head" type="button" name="changPass">Chang Password</button></a>
     <a href="index.php"><button class="head" type="button" name="signOff">Sign Off</button></a>

</html>
<?php } ?>
