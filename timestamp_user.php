<?php
// echo "timestamp_user"."<br>";
include("connectDB.php");
session_start();
$userid = $_SESSION['who'];
// echo $userid."<br>";
//select Name from User table
$Name = "";
$sql = "SELECT * FROM User";
if($query = mysqli_query($connect,$sql)){
  while($row = mysqli_fetch_array($query)){
    if($userid ==$row['userID']){
      $Name = $row['name'];
      $_SESSION['name'] = $Name;
      // echo $Name."<br>";
    }
  }
}

// echo $Name."<br>";
$weekDay = array( 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสฯ', 'ศุกร์', 'เสาร์');
$thaiMonth = array( "01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน",
                  "05" => "พฤษภาคม","06" => "มิถุนายน", "07" => "กรกฎาคม", "08" => "สิงหาคม",
                  "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม");

$EngMonth = array( "01" => "Jun", "02" => "Feb", "03" => "Mar", "04" => "Apr",
                  "05" => "May","06" => "Jun", "07" => "Jul", "08" => "Aug",
                  "09" => "Sep", "10" => "Oct", "11" => "Nov", "12" => "Dec");

//รับค่าจากหน้าวันที่ ที่ผู้ใช้เลือกช่วง report มา
if($_REQUEST){
  $dateStart = $_REQUEST['dateStart'];
  $dateLast = $_REQUEST['dateEnd'];
  // echo $dateStart."<br>";
  // echo $dateLast."<br>";

  //chang Format
  $mountStart = substr($dateStart,3,3);
  $mountLast = substr($dateLast,3,3);
  // echo $mountStart."<br>";
  // echo $mountLast."<br>";

  foreach ($EngMonth as $numDate => $valueDate) {
    if($mountStart == $valueDate){
        $mountStart = $numDate;
    }
    if($mountLast == $valueDate){
        $mountLast = $numDate;
    }
  }
  // echo "----------------------<br>";
  // echo $mountStart."<br>";
  // echo $mountLast."<br>";

  $dateFirst = substr($dateStart,7,4)."-".$mountStart."-".substr($dateStart,0,2);
  $dateLastes = substr($dateLast,7,4)."-".$mountLast."-".substr($dateLast,0,2);
  // echo "First Date = ".$dateFirst."<br>";
  // echo "Last Date = ".$dateLastes."<br>";
  // $countDate = ((substr($dateLast,0,2)-substr($dateStart,0,2))+1)."<br>";
  // echo "count dadte = ".$countDate."<br>";
  $first = substr($dateStart,0,2)+0;
  $last = substr($dateLast,0,2)+0;
  // echo $first."<br>";
  // echo $last."<br>";

  $today = date("Y-m-d");
  // echo "Today ".$today."<br>";
  if($dateLastes <= $today){
      // echo "55555<br>";

include("select_work.php");
//show value
    // echo "----------------Work Enter--------------<br>";
    foreach ($workEnterImg as $key => $value) {
      // echo $key." : ".$value."<br>";
    }

    // echo "----------------Work Out--------------<br>";
    foreach ($workOutImg as $key => $value) {
        // echo $key." : ".$value."<br>";
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
      <center><h3><?php echo $Name; ?></h3></center>
      <table>
        <tr>
          <th class="firn">วันที่</th>
          <th class="firn">เวลาเข้า</th>
          <th class="firn">เวลาออก</th>
          <th class="firn">ภาพถ่าย</th>
        </tr>
        <?php
        for ($day=$first; $day <=$last ; $day++) {
          // echo $day." ";
          echo "<tr>";
          $check_enter = false;
          $check_out = false;
          $indexIN =0;
          $indexOut =0;
          foreach ($workEnterImg as $e => $enterImg){
            $date_enter = substr($enterDate[$e],8,2)+0;
            // echo ">>IN>>".$date_enter."<br>";
              if($day==$date_enter){
                  $check_enter = true;
                  $indexIN = $e;
              }
          }
          foreach ($workOutImg as $o=> $outImg) {
            $date_out = substr($outDate[$o],8,2)+0;
            // echo "--Out--".$date_out."<br>";
              if($day==$date_out){
                  $check_out = true;
                  $indexOut = $o;
                  // echo "DAY :".$day."<br>";
                  // echo $date_out."<br>";
              }
          }

          if($check_enter == true && $check_out == true){
            $date = $enterDate[$indexIN];
            // echo  $workEnterImg[$indexIN]."<br>";
            // echo    $workOutImg[$indexOut]."<br>";

            echo "<td>".$date."</td>";
            echo "<td>".$enterTime[$indexIN]."</td>";
            echo "<td>".$outTime[$indexOut]."</td>";
            ?>
            <td><a href="show_image.php?img1=<?php echo $workEnterImg[$indexIN];?>&img2=<?php echo $workOutImg[$indexOut];?>&date=<?php echo $date; ?>">คลิก</a></td>
            <?php
          }else if($check_enter == true && $check_out == false){
            $date = $enterDate[$indexIN];
            echo "<td>".$date."</td>";
            echo "<td>".$enterTime[$indexIN]."</td>";
            echo "<td><center> - </center></td>";
            ?>
            <td><a href="show_image.php?img1=<?php echo $workEnterImg[$indexIN];?>&date=<?php echo $date; ?>">คลิก</a></td>
            <?php
          }else if($check_enter == false && $check_out == true){
            $date = $outDate[$indexOut];
            echo "<td>".$date."</td>";
            echo "<td><center> - </center></td>";
            echo "<td>".$outTime[$indexOut]."</td>";
            ?>
            <td><a href="show_image.php?img2=<?php echo $workOutImg[$indexOut];?>&date=<?php echo $date; ?>">คลิก</a></td>
            <?php
          }
          echo "</tr>";
        }//close for
         ?>
      </table>
</body>
</html>
<?php
  }else{
    echo "เลือกวันที่ผิดเงื่อนไข กรุณาทำรายการใหม่ค่ะ<br>";
    header("Location: report_user.php");
  }
}
 ?>
