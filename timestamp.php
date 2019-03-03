<?php
$who_timestamp = $_GET['timestamp'];
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
<body>
      <h2>รายงานเวลาการเข้างาน</h2><br>
      <h3>เลือกวันที่ต้องการดูจากด้านล่าง</h3>
</body>
</html>
<?php
if ($who_timestamp) {
  include 'calender.php';
}
?>
<a href="show_timestamp"><b>ยืนยัน</b></a>
