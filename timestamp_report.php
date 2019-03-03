้<!DOCTYPE html>
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
      <h2>รายงานเวลาการเข้างาน</h2>
      <div class="container">
      <form method="get" action="timestamp.php">
          <div class="choose_timestamp">
            <label for="report">เลือกรายชื่อ</label>
            <select  id="timestamp" name ="timestamp">
              <option></option>
              <option name="CP01">พี่ประวิม</option>
              <option name="CP02">พี่แอน</option>
              <option name="CP03">พี่หมาย</option>
              <option name="CP04">พี่นพดล</option>
              <option name="CP05">พี่สานนท์</option>
              <option name="CP06">พี่เอ๋ย</option>
            </select>
            <input style="margin-top: 10px;" type="submit" name="send_report" value="ยืนยัน">
          </div>
      </form>
    </div>
</body>
</html>
