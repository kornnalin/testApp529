<?php
// $who_timestamp = $_GET['timestamp'];
// echo $who_timestamp."<br>";
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
</head>
<style>
h2{
  color: blue;
}
input{
  width: 50%;
  border-color: gray;
  padding: 3px;
}
</style>
<body>
      <h2><b>รายงานเวลาการเข้างาน<b></h2><br><br>
      <h4>เลือกวันที่ต้องการดูจากด้านล่าง</h4>
      <div class="row">
        <center>
        <form action="show_timestamp.php" method="get">
        <h4>ตั้งแต่วันที่ : <input type="date" name="first" ></h4><br>
        <h4>ถึงวันที่  : <input type="date" name="last"></h4><br>
        <h4><input type="submit" value="ยืนยัน"></h4>
      </form>
      </center>
      </div>
</body>
</html>
<?php
// if ($who_timestamp) {
//   include 'calender.php';
// }
?>
<!-- <button  style="text-align:center; margin-top: 10px; float: right;"><b><a href="show_timestamp.php">ยืนยัน</a></b></button> -->
