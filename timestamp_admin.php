<?php
include("connectDB.php");
include("select_work.php");

session_start();
$userid = $_SESSION['who'];
// echo $userid."<br>";
if($_REQUEST){
  // echo "666667776<br>";
  $userid_need = $_REQUEST['choose'];
  $_SESSION['userID_need'] = $userid_need;
  // echo $userid_need."<br>";
  $name ="";
  //select user find Name user
  $sql = "SELECT * FROM User";
    if($query = mysqli_query($connect,$sql)){
      while($row = mysqli_fetch_array($query)){
        if($userid_need == $row['userID']){
          $name = $row['name'];
          // echo $name."<br>";
        }
      }
    }
    $today = date("Y-m-d");
    // echo "Today ".$today."<br>";
    $day = substr($today,8,2);
    // echo $day."<br>";

    //ตัวแปร ช่วงขาเข้างาน
    $workEnterImg = array(); //เก็บชื่อรูป
    $enterDate = array(); // เก็บวันที่ขาเข้างาน
    $enterTime = array(); //เก็บเวลาขาเข้า
    $indexEnter = 0;

    //ตัวแปร ช่วงขาออกงาน
    $workOutImg = array();//เก็บชื่อรูป
    $outDate = array(); // เก็บวันที่ขาออกงาน
    $outTime = array();//เก็บเวลาขาออก
    $indexOut = 0;

    // echo "ENTER<br>";
    //select db Work_Enter
      $sql_workEnter = "SELECT * FROM Work_Enter";
      if($query = mysqli_query($connect,$sql_workEnter)){
        while($row = mysqli_fetch_array($query)){
            $nameImg = $row['image'];
            $userID_Owner = $row['userID_Owner'];
            $dateEnter = $row['dateEnter'];
            $timeEnter = $row['timeEnter'];
            $who = $row['who'];
            // echo $nameImg."  ";
            // echo $userID_Owner."  ";
            // echo $dateEnter."  ";
            // echo $timeEnter."<br>";
            // echo $who."<br>";
            // echo "------------------------<br>";
            if($userid_need == $userID_Owner){
                    $workEnterImg[$indexEnter] = $nameImg;
                    $enterDate[$indexEnter] = $dateEnter;
                    $enterTime[$indexEnter] = $timeEnter;
                    $indexEnter++;
            }
        }
      }else {
        echo "Can't connect DB !!!<br>";
      }

    // echo "OUT<br>";
    //select db Work_Out
    $sql_workOut = "SELECT * FROM Work_Out";
    if($query = mysqli_query($connect,$sql_workOut)){
      while($row = mysqli_fetch_array($query)){
        $nameImg = $row['image'];
        $userID_Owner = $row['userID_Owner'];
        $dateOut = $row['dateOut'];
        $timeOut = $row['timeOut'];
        $who = $row['who'];
        // echo $nameImg." ";
        // echo $userID_Owner." ";
        // echo $dateOut."  ";
        // echo $timeOut."<br>";
        // echo $who."<br>";
        // echo "++++++++++++++++++++<br>";
        if($userid_need == $userID_Owner){
              $workOutImg[$indexOut] = $nameImg;
              $outDate[$indexOut] = $dateOut;
              $outTime[$indexOut] = $timeOut;
              // echo $workOutImg[$indexOut]."<br>";
              // echo $outDate[$indexOut]."<br>";
              // echo $outTime[$indexOut]."<br>";
              $indexOut++;
          }
        // echo "++++++++++++++++++++++<br>";
      }
    }else {
      echo "Can't connect DB !!!<br>";
    }
?>
<html>
<head>
  <title>Work Reports</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel = "stylesheet" type = "text/css" href = "style.css" >
</head>
<style>
img{
  /* width: 40%; */
  height: auto;
}
h2{
  color: blue;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
th{
  background-color: #FFC900;
  text-align: center;
}
td, th {
  border: 1px solid #FFF089;;
  text-align: left;
  padding: 8px;
}
.firn{
  text-align: center;
  border: 1px solid #FFF089;;
}

tr:nth-child(even) {
  background-color: #FFF089;;
}
</style>
<body>
      <h2><b>รายงานเวลาการเข้างาน</b></h2><br>
      <center><h3><?php echo $name; ?></h3></center>
      <table>
        <tr>
          <th class="firn">วันที่</th>
          <th class="firn">เวลาเข้า</th>
          <th class="firn">เวลาออก</th>
          <th class="firn">ภาพถ่าย</th>
        </tr>
        <?php
        for ($d=1; $d <=$day ; $d++) {
          // echo $d." ";
          echo "<tr>";
          $check_enter = false;
          $check_out = false;
          $indexIN =0;
          $indexOut =0;

          foreach ($workEnterImg as $e => $enterImg){
            $date_enter = substr($enterDate[$e],8,2)+0;
            // echo ">>IN>>".$date_enter."<br>";
              if($d==$date_enter){
                  $check_enter = true;
                  $indexIN = $e;
              }
          }
          foreach ($workOutImg as $o=> $outImg) {
            $date_out = substr($outDate[$o],8,2)+0;
            //echo "--Out--".$date_out."<br>";
              if($d==$date_out){
                  $check_out = true;
                  $indexOut = $o;
              }
          }

          if($check_enter == true && $check_out == true){
            $date = $enterDate[$indexIN];
            echo  $workEnterImg[$indexIN]."<br>";
            echo $workOutImg[$indexOut]."<br>";

            echo "<td>".$date."</td>";
            echo "<td>".$enterTime[$indexIN]."</td>";
            echo "<td>".$outTime[$indexOut]."</td>";
            ?>
            <td><a href="show_image_admin.php?img1=<?php echo $workEnterImg[$indexIN];?>&img2=<?php echo $workOutImg[$indexOut];?>&date=<?php echo $date; ?>">คลิก</a></td>
            <?php
          }else if($check_enter == true && $check_out == false){
            $date = $enterDate[$indexIN];
            echo "<td>".$date."</td>";
            echo "<td>".$enterTime[$indexIN]."</td>";
            echo "<td><center> - </center></td>";
            ?>
            <td><a href="show_image_admin.php?img1=<?php echo $workEnterImg[$indexIN];?>&date=<?php echo $date; ?>">คลิก</a></td>
            <?php
          }else if($check_enter == false && $check_out == true){
            $date = $outDate[$indexOut];
            echo "<td>".$date."</td>";
            echo "<td><center> - </center></td>";
            echo "<td>".$outTime[$indexOut]."</td>";
            ?>
            <td><a href="show_image_admin.php?img2=<?php echo $workOutImg[$indexOut];?>&date=<?php echo $date; ?>">คลิก</a></td>
            <?php
          }
          echo "</tr>";
        }//close for
         ?>
      </table>
</body>
</html>
<?php } ?>
