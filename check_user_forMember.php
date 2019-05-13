<?php
include("connectDB.php");
$value_userID = $_REQUEST['user'];
$status = false;


if($_REQUEST['user']){
// if($_SESSION["userid"]){
echo $value_userID."<br>";
//check UserID in DB by Select from DB
  $sql = "SELECT * FROM User";
  if($query = mysqli_query($connect,$sql)){
    while($row = mysqli_fetch_array($query)){
      $UserID = $row['userID'];
      $Name = $row['name'];
      $Status = $row['status'];
      if($value_userID == $UserID){
        echo $UserID." ".$Name." ".$Status."<br>";
        $status = true;
      }
    }
  }else{
    echo "Can't Connect Please Try Again"."<br>";
  }

  if($status == true){
    session_start();
    $_SESSION["userid"] = $value_userID;
    header("Location: alert_member.php");
  }else{
    session_start();
    $_SESSION["userid"] = $value_userID
    header("Location: add_member.php");
  }
}
else{
  echo "Error No UserId <br>";
}
?>
