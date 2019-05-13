<?php
if($_GET['id']){
include("connectDB.php");
$sqlSelect = "SELECT * FROM User";
$result = mysqli_query($connect, $sqlSelect);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $userID = $row["userID"];
      $name = $row["name"];
      $status = $row["status"];
      if($_GET['id'] == $userID){
        if($status == "admin"){
          echo "----------------------------<br>";
          echo $userID."<br>";
          echo $name."<br>";
          echo $status."<br>";
          echo "----------------------------<br>";
        }else if($status == "user"){
          echo $name."<br>";
          echo $status."<br>";
        }
      }
    }
}
$connect->close();
}
?>
