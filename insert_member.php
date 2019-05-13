<html>
  <head>
    <meta charset="utf-8">
  <head>
</html>
<?php
include("connectDB.php");
session_start();
$Page = $_SESSION['page'];
$UserID =$_SESSION["userid"];
echo $UserID."<br>";
echo $Page."<br>";

//Get Value Post
  $Name = $_REQUEST['name'];
  $NickName = $_REQUEST['nickname'];
  $UesrLogin = $_REQUEST['user'];
  $Pwd = $_REQUEST['pwd'];
  $PwdAgain = $_REQUEST['pwdagain'];
  $Status = $_REQUEST['status'];

  if($Name && $NickName && $UesrLogin && $Pwd && $PwdAgain && $Status){
  // echo $UserID ."<br>";
  // echo $status."<br>";
      // echo $Name."<br>";
      // echo $NickName."<br>";
      // echo $UesrLogin."<br>";
      // echo $Pwd."<br>";
      // echo $PwdAgain."<br>";
      // echo $Status."<br>";
      if ($Pwd == $PwdAgain) {
        if($UserID){
        // Insert into Table
        $sql = "INSERT INTO User (userID,userLogin,pwd,pwdAgain,name,nickName,status)
              VALUES ('".$UserID."','".$UesrLogin."','".$Pwd."','".$PwdAgain."','".$Name."','".$NickName."','".$Status."')";
          if($connect ->query($sql) === TRUE){
            echo "เพิ่มสมาชิกใหม่เข้าสู่ระบบเรียบร้อยแล้วนะคะ";

          //สร้างโฟลเดอร์รูปภาพโดยให้เป็นชื่อ UserID ของเขา ($UserID)
          $folder = "/home/u07580529/public_html/project529/www/imageTag/".$UserID;
          $create_folder = mkdir($folder);
          chmod($folder,0777);

            header("Location: $Page");
          }else{
            echo "ไม่สามารถเพิ่มสามาชิกเข้าสู่ระบบได้";
          }
        }echo "No Userid";
      }else{
        echo "กรอก Password ผิดโปรดกรอกใหม่อีกครั้ง<br>";
      }



  }
?>
