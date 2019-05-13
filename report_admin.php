<?php
include("connectDB.php");
session_start();
// echo $_SESSION['who']."<br>";

$getNickName = array();
$getUserId = array();
$i = 0;
$sql = "SELECT * FROM User";
  if($query = mysqli_query($connect,$sql)){
    while($row = mysqli_fetch_array($query)){
      $getNickName[$i] = $row['nickName'];
      $getUserId[$i] = $row['userID'];
      // echo $getUserId[$i]." ".$getUserId[$i]."<br>";
      $i++;
    }
  }
?>
<html lang="en" dir="ltr">
<head>
  <title>Work Reports</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "style.css" >
  <style>

    h1{
      text-align: center;
      font-size: 40px;
    }
      input{
        font-family: 'TH Sarabun New', Times, Arial, Helvetica, sans-serif;
        text-align: center;
        border: none;
        font-weight: bold;
        width: auto;
      }

      button:hover{
        background-color: rgb(255,145,0);
        color: white;
      }

      img{
        width: 300px;
        height: auto;
        text-align: center;
      }
  </style>
</head>
<body>
  <h2 style="color:blue;"><b>รายงานเวลาการเข้างาน</b></h2><br>
    <div class="container">
      <center><form method="get" action="timestamp_admin.php">
          <div class="choose_timestamp">
            <h3><b>เลือกรายชื่อ</b></h3>
            <!-- <label for="report">เลือกรายชื่อ</label> -->
            <!-- <select  id="timestamp" name ="timestamp"> -->
              <!-- <option></option>
              <option name="CP01">พี่ประวิม</option> -->
            <?php
              foreach ($getNickName as $key => $name) {
                  // echo "<a href='timestamp_admin.php?choose=",urlencode($getUserId[$key]),"'>".'<option class="name" name="c2"; value="'.$getUserId[$key].'" style="color:black;"><b>'.$getNickName[$key].'</b></option></a>';
                  echo "<a href='timestamp_admin.php?choose=",urlencode($getUserId[$key]),"'>".'<button class="name" type="button" name="'.$getUserId[$key].'" style="color:black;"><b>'.$getNickName[$key].'</b></button></a>';
              }
            ?>
             <!-- </select> -->
             <!-- <input class="firn" style="margin-top:10px; padding:5px; background-color:rgb(255,145,0);" type="submit" name="send_report" value="ยืนยัน"> -->
          </div>
        </form></<center>
    </div>
  </body>
</html>
