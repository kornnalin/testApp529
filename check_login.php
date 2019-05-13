<?php
include("connectDB.php");
$username = $_POST['username'];
$password = $_POST['password'];
$status = false;
$error = flase;
$message_error ="";

$sqlSelect = "SELECT * FROM User";
if($query = mysqli_query($connect,$sqlSelect)){
  while($row = mysqli_fetch_array($query)){

    if($row["userLogin"] == $username){
      if($row["pwd"] == $password){
        $error = flase;
       session_start();
        $_SESSION['login'] = "OK";
        $_SESSION['user'] = $username;
        $_SESSION['who'] = $row['userID'];
        $_SESSION["status"] = $row['status'];

        if($_SESSION["need"] == "Tag"){
          header("Location: tag.php");
        }
        else if($_SESSION["need"] == "Report"){

            if(  $_SESSION["status"] == "user"){
              header("Location: report_user.php");
            }
            else if(  $_SESSION["status"] == "admin"){
              header("Location: report_admin.php");
            }
        }
    }else{
      $error = true;
      $message_error = "กรอกข้อมูลไม่ถูกต้อง!! กรุณากรอกใหม่ให้ถูกต้องค่ะ<br>";
    }
}else{
  $error = true;
  $message_error = "กรอกข้อมูลไม่ถูกต้อง!! กรุณากรอกใหม่ให้ถูกต้องค่ะ<br>";
}
  }
}

if($error = true){
?>
<html dir="ltr">
 <head>
   <meta charset="utf-8">
   <link rel = "stylesheet" type = "text/css" href = "style.css" >
   <title>Alert Login</title>
 </head>
 <style>
   body{
     text-align: center;
     font-size: 18px;
   }
   h1{
     background-color:red;
     color: white;
     margin-top: 10%;
     margin-left:-10px;
     margin-right:-10px;
     margin-bottom: 20%;
     padding-top:10px;
     padding-bottom:10px;
     font-size: 60px;
   }
 </style>
 <body><br><br>
   <h1> <?php echo $message_error;?></h1>
  </body>
  </html>
<?php
echo "<script>setTimeout(\"location.href = 'login.php';\",1500);</script>";
}

$connect->close();
?>
