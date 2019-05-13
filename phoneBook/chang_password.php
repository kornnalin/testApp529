<?php
include("head.php");
?>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <form action="check_change_pass.php" method="post">
    <h2>Chang Password</h2>
    Old Password : <input type="password" name="oldPass" ></br>
    New Password :<input type="password" name="newPass" ></br>
    (Re-type)Password :<input type="password" name="rePass" ></br>
    <input type="submit" name="changed" value="CHANGE"><br>
    </form>
    <a href="chang_password.php"<button type="button" name="cancel"></button></a>


  </body>
</html>
