<?php
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
        if($userid == $userID_Owner){
            if ($dateEnter >= $dateFirst && $dateEnter <= $dateLastes ) {
                $workEnterImg[$indexEnter] = $nameImg;
                $enterDate[$indexEnter] = $dateEnter;
                $enterTime[$indexEnter] = $timeEnter;
                $indexEnter++;
            }
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
    if($userid == $userID_Owner){
        if ($dateOut >= $dateFirst && $dateOut <= $dateLastes ) {
          $workOutImg[$indexOut] = $nameImg;
          $outDate[$indexOut] = $dateOut;
          $outTime[$indexOut] = $timeOut;
          // echo $workOutImg[$indexOut]."<br>";
          // echo $outDate[$indexOut]."<br>";
          // echo $outTime[$indexOut]."<br>";
          $indexOut++;
        }
    }
    // echo "++++++++++++++++++++++<br>";
  }
}else {
  echo "Can't connect DB !!!<br>";
}
 ?>
