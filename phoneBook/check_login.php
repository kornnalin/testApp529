<?php
include("connectDB.php");
$username = $_POST['username'];
$password = $_POST['password'];
$status = false;

$sqlSelect = "SELECT * FROM login";
$result = mysqli_query($connect, $sqlSelect);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if($row["user"]==$username){
          if($row["pwd"]==$password){
            session_start();
            $_SESSION['login'] = "OK";
            $_SESSION['user'] = $username;
            $_SESSION['name'] = $row['name'];
            $_SESSION['pass'] = $row['pwd'];
          header("Location: phoneList.php");
        }else{
          header("Location: index.php");
        }
    }
}
}
$connect->close();
?>
