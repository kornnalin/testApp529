<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <title>เข้าสู่ระบบ</title>
  <link rel="stylesheet" href="fonts/thsarabunnew.css"/>
  <link rel = "stylesheet" type = "text/css" href = "style.css" >
  <style>

    h1{
      text-align: center;
      font-size: 50px;
    }
    h2{
      text-align: center;
      font-size: 40px;
    }
      input{
        font-family: 'TH Sarabun New', Times, Arial, Helvetica, sans-serif;
        border: none;
        font-weight: bold;
        width: auto;
      }

  </style>
<body>
<center>
<h1 style="color:blue"><b>ระบบบันทึกเวลาเข้าออกอัตโนมัติด้วยการถ่ายภาพ</b></h1>
<div class="container">
  <h2><b>เข้าสู่ระบบ<b></h2><br>
  <form  action="check_admin.php" method="post">
  <h3><b>ชื่อผู้ใช้งาน </b><input id = username type="text" name="username"></h3>
  <h3><b>รหัสผ่าน   </b><input id = password type="password" name="password"></h3></br>
  <input class="name" type="submit" name="signOn" value ="ยืนยัน"></input>
  </form>
  <!-- <a href="newUser.php"><button type="button" name="newUser" >New User</button></a> -->
</div>
</center>
</body>
</html>
