<?php
include("connectDB.php");
$oldPassword = $_POST['oldPass'];
$newPassword = $_POST['newPass'];
$rePassword = $_POST['rePass'];

  $sql = "SELECT * FROM login";
  $re = mysqli_query($connect,$sql);

  if(mysqli_num_rows($re)>0){
    while($row = mysqli_fetch_assoc($re)) {
        if($oldPassword == $row["pwd"]){
          if($newPassword == $rePassword){
                $sqlUpdate = "UPDATE login SET pwd = '".$newPassword."' WHERE pwd = '".$oldPassword."'";
                if($connect->query($sqlUpdate) === TRUE){
                echo "Update finished";
                }
          }
        }

    }
  }
$connect->close();
?>
