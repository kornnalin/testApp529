<?php
header('Content-Type: text/html; charset=utf-8');
$weekDay = array( 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสฯ', 'ศุกร์', 'เสาร์');
$thaiMon = array( "01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน",
                  "05" => "พฤษภาคม","06" => "มิถุนายน", "07" => "กรกฎาคม", "08" => "สิงหาคม",
                  "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม");

//Sun - Sat
$month = isset($_GET['month']) ? $_GET['month'] : date('m'); //ถ้าส่งค่าเดือนมาใช้ค่าที่ส่งมา ถ้าไม่ส่งมาด้วย ใช้เดือนปัจจุบัน
// $month = $month+1;
// $month = "0".$month;
// echo $month."<br>";
$year = isset($_GET['year']) ? $_GET['year'] : date('Y'); //ถ้าส่งค่าปีมาใช้ค่าที่ส่งมา ถ้าไม่ส่งมาด้วย ใช้ปีปัจจุบัน
// echo $year."<br>";
$startDay = $year.'-'.$month."-01";   //วันที่เริ่มต้นของเดือน
// echo $startDay."<br>";
$timeDate = strtotime($startDay);   //เปลี่ยนวันที่เป็น timestamp
// echo $timeDate."<br>";
$lastDay = date("t", $timeDate);   //จำนวนวันของเดือน
// echo $lastDay."<br>";
$endDay = $year.'-'.$month."-". $lastDay;  //วันที่สุดท้ายของเดือน
// echo $endDay."<br>";
$startPoint = date('w', $timeDate);   //จุดเริ่มต้น วันในสัปดาห์
// echo $startPoint."<br>";
$currentDay = date("d")+1;
// echo $currentDay."<br>";
?>
<html>
 <head>
 <title>Calendar</title>
 <script type='text/javascript'>
    function goTo(month, year){
   window.location.href = "day_of_week.php?year="+ year +"&month="+ month;
    }
 </script>
 <style>
 th,td{width:50px; height: 30px; text-align:center; background-color: white;}
 th{background-color: #FFE800;}
 /* #tb_calendar, #main{ width : 400px; } */
 #main{ border : 5px solid #FFC900;
        border-left: 12px solid #FFC900;
        border-right: 12px solid #FFC900;}
 #nav{
  font-size: 20px;
  background-color: #FFC900;
  min-height: 20px;
  padding: 10px;
  /* text-align: center; */
  color : black;
 }
 .navLeft{float: left; }
 .navRight{float: right;}
 .title{text-align: center;}
 </style>
 </head>
 <body>

<?php
$title = "<strong>เดือน $thaiMon[$month] ".$year." </strong>";
// echo $title."<br>";

// //ลดเวลาลง 1 เดือน
// $prevMonTime = strtotime ( '-1 month' , $timeDate  );
// $prevMon = date('m', $prevMonTime);
// $prevYear = date('Y', $prevMonTime);
// // echo $prevMonTime."<br>";
// // echo $prevMon."<br>";
// // echo $prevYear."<br>";
//
// //เพิ่มเวลาขึ้น 1 เดือน
// $nextMonTime = strtotime ( '+1 month' , $timeDate  );
// $nextMon = date('m', $nextMonTime);
// $nextYear = date('Y', $nextMonTime);

echo '<div id="main">';
  echo '<div id="nav">
  <div class="title">'.$title.'</div>
</div>
 <div style="clear:both"></div>';
echo "<table id='tb_calendar' border='0'>"; //เปิดตาราง
echo "<tr>
  <th>อาทิตย์</th><th>จันทร์</th><th>อังคาร</th><th>พุธ</th><th>พฤหัสฯ</th><th>ศุกร์</th><th>เสาร์</th>
</tr>";
echo "<tr>";    //เปิดแถวใหม่
$col = $startPoint;          //ให้นับลำดับคอลัมน์จาก ตำแหน่งของ วันในสับดาห์
if($startPoint < 7){         //ถ้าวันอาทิตย์จะเป็น 7
 echo str_repeat("<td> </td>", $startPoint); //สร้างคอลัมน์เปล่า กรณี วันแรกของเดือนไม่ใช่วันอาทิตย์
}
for($i=1; $i <= $lastDay; $i++){ //วนลูป ตั้งแต่วันที่ 1 ถึงวันสุดท้ายของเดือน
 $col++;       //นับจำนวนคอลัมน์ เพื่อนำไปเช็กว่าครบ 7 คอลัมน์รึยัง
 if($i==$currentDay){
   echo "<td style='background-color:red;'>", $i , "</td>";
 }else{
   echo "<td>", $i , "</td>";
 }
   //สร้างคอลัมน์ แสดงวันที่
 if($col % 7 == false){   //ถ้าครบ 7 คอลัมน์ให้ขึ้นบรรทัดใหม่
  echo "</tr><tr>";   //ปิดแถวเดิม และขึ้นแถวใหม่
  $col = 0;     //เริ่มตัวนับคอลัมน์ใหม่
 }
}
if($col < 7){         // ถ้ายังไม่ครบ7 วัน
 echo str_repeat("<td> </td>", 7-$col); //สร้างคอลัมน์ให้ครบตามจำนวนที่ขาด
}
echo '</tr>';  //ปิดแถวสุดท้าย
echo '</table>'; //ปิดตาราง
echo '</main>';

?>
</body>
</html>
