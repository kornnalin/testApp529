<?php
include("connectDB.php");
if($_REQUEST['own']){

session_start();
$_SESSION['owner'] = $_REQUEST['own'];
$owner_photo = $_SESSION['owner']; // UserID เจ้าของภาพ
$photo = $_SESSION['Photo']; //ชื่อรูปภาพ
$who_tag = $_SESSION['who']; // UserID ของคนที่แท็กภาพ

// echo $_SESSION['Photo']."<br>";
// echo (strlen($photo))."<br>"; //ความยาวชื่อภาพถ่าย
// echo "UserID เจ้าของภาพ ".$owner_photo."<br>";
// echo "UserID ของคนแท็กภาพ ".$who_tag."<br>";

$date = substr($photo,0,10); //วันที่
// echo $date."<br>";

//แปลง เวลาเป็นfomat 00:00:00
$minute = substr($photo,11,2);
$secode = substr($photo,14,2);
$millisecode = substr($photo,17,2);

$time = $minute.":".$secode.":".$millisecode ;
// echo $time."<br>";

//ช่วงการทำงาน เข้างาน(Enter) หรือ เลิกงาน (Out)
if(strlen($photo)==29){
  $work_status = substr($photo,20,5);
  // echo $work_status."<br>";
  $_SESSION['work'] = $work_status;
}else if(strlen($photo)==27){
  $work_status = substr($photo,20,3);
  // echo $work_status."<br>";
    $_SESSION['work'] = $work_status;
}

//Select ชื่อเจ้าของภาพถ่าย และ ชื่อคนแท็ก
$name_owner ="";
$name_who_tag ="";

$sql = "SELECT * FROM User";
if($query = mysqli_query($connect,$sql)){
  while($row = mysqli_fetch_array($query)){
    $UserID = $row['userID'];
    $Name = $row['name'];

     if($owner_photo == $UserID){
        $name_owner = $Name;
         // echo "เจ้าของภาพ ".$UserID." ".$Name."<br>";
      }
      if($who_tag == $UserID){
        $name_who_tag = $Name;
        // echo "คนแท็กภาพ ".$UserID." ".$Name."<br>";
      }
  }
}
$message = "";
if($owner_photo == $who_tag){
  $message = "คุณ".$name_owner." ต้องการแท็กภาพถ่ายของตัวเองนะคะ";
}else{
  $message = "คุณ".$name_who_tag." ต้องการแท็กภาพถ่ายของคุณ ".$name_owner." นะคะ";
}
?>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
     <title>Tag Member</title>
     <link rel="stylesheet" href="fonts/thsarabunnew.css" />
     <link rel = "stylesheet" type = "text/css" href = "style.css" >
   </head>
   <style >
   .box_message{
     background-color: pink;
     margin: 5%;;
     border-radius:10px;
   }
   input{
     font-family: 'TH Sarabun New', Times, Arial, Helvetica, sans-serif;
     text-align: center;
     border: none;
     font-weight: bold;
     width: 100%;
     background-color:pink;
    }

   input:hover{
     background-color: rgb(60, 179, 113);
     color: black;
   }
   </style>
   <body>
    <center>
      <div class="box_message">
        <h3 style="padding-top:20px;"><?php echo $message."<br>";?></h3>
        <form class="name" action="tag_action.php" method="post">
          <input class="name" type="submit" name="submit" value="ยืนยันการแท็กภาพ">
        </form>
        <br>
      </div>
   </center>
   </body>
 </html>
<?php
}
?>
