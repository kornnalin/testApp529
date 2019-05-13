<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Status images Tag</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "style.css" >
    </head>

  <body>
    <h2><b>สถานะการแท็กภาพถ่าย<b></h2>
  <div class="container">
  <form>
      <div class="choose_status">
        <label for="input_status">เลือกการแสดงสถานะ</label>
        <select  id="input_status" name ="status">
          <option></option>
          <option>ภาพที่ถูกแท็กเจ้าของภาพแล้ว</option>
          <option>ภาพที่ยังไม่ได้แท็ก</option>
          <option>แก้ไขภาพที่แท็กผิด</option>
        </select>
        <input style="margin-top: 10px;" type="submit" name="send_status" value="ยืนยัน">
      </div>
  </form>
</div>
<?php
if ($_GET) {
  // echo "<h3>".$_GET["status"]."</h3>";
  $status = $_GET["status"];
  if($status =="ภาพที่ถูกแท็กเจ้าของภาพแล้ว"){
    ?>
    <h3><b>ภาพที่ถูกแท็กเจ้าของภาพแล้ว<b></h3>
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-3 col-lg-3" >
            <img src="image/2019-03-20_17_14_12.jpg" alt="P'Parwim">
            <h4><b>เวลา : </b>17:14</h4>
        </div>
        </div>
      </div>
      </div>
  <?php
  }else if($status =="ภาพที่ยังไม่ได้แท็ก"){
  ?>
    <h3><b>ภาพที่ยังไม่ได้แท็ก</b></h3>
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-3 col-lg-3" >
            <a href="tag1.php"><img src="image/2019-03-20_16_47_36.jpg" alt="P'A"></a>
        </div>
      </div>
  </div>
<?php
}else if($status=="แก้ไขภาพที่แท็กผิด"){
?>
  <h3><b>แก้ไขภาพที่แท็กผิด</b></h3>
  <div class="container">
  <form method="get" action="edit_tag.php">
      <div class="choose_status">
        <!-- <label for="input_status">เลือกรายชื่อคนที่จะแก้ไข</label> -->
        <select  id="edit_status" name ="edit">
          <option>เลือกรายชื่อคนที่จะแก้ไข</option>
          <option name="CP01">พี่ประวิม</option>
          <option name="CP02">พี่แอน</option>
          <option name="CP03">พี่หมาย</option>
          <option name="CP04">พี่นพดล</option>
          <option name="CP05">พี่สานนท์</option>
          <option name="CP05">พี่เอ๋ย</option>
        </select>
        <input style="margin-top: 10px;" type="submit" name="send_status" value="ยืนยัน">
      </div>
  </form>
</div>
<?php
}
}
?>
</body>
</html>
