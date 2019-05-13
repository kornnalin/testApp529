<?php
include("connectDB.php");

if ($_REQUEST['submit']) {
// echo $_REQUEST['submit']."<br>";
  session_start();
  $photo = $_SESSION['Photo']; //ชื่อรูปภาพ
  $owner_photo = $_SESSION['owner']; // UserID เจ้าของภาพ
  $who_tag = $_SESSION['who']; // UserID ของคนที่แท็กภาพ
  $work_status =   $_SESSION['work'];

  $date = substr($photo,0,10); //วันที่
  //แปลง เวลาเป็นfomat 00:00:00
  $minute = substr($photo,11,2);
  $secode = substr($photo,14,2);
  $millisecode = substr($photo,17,2);
  $time = $minute.":".$secode.":".$millisecode ;

  // echo $photo."<br>";
  // echo (strlen($photo))."<br>"; //ความยาวชื่อภาพถ่าย
  // echo "UserID เจ้าของภาพ ".$owner_photo."<br>";
  // echo "UserID ของคนแท็กภาพ ".$who_tag."<br>";
  // echo $work_status."<br>";
  // echo $date."<br>";
  // echo $time."<br>";

//set โฟเดอร์ที่อยูไฟล์ภาพ
  // $dir = "./image";
  // $dirNew = "./imageTag";
$dir = "/home/u07580529/public_html/project529/www/image";
$dirNew = "/home/u07580529/public_html/project529/www/imageTag/".$owner_photo;
  // echo $dir."<br>";
  // echo $dirNew."<br>";
  $sql_Insert;
  $status = false;

  if($work_status == "Enter"){
    $sql_Insert = "INSERT INTO Work_Enter (image,userID_Owner,dateEnter,timeEnter,who)
          VALUES ('".$photo."','".$owner_photo."','".$date."','".  $time."','".$who_tag."')";
    $status = true;
  }else if($work_status == "Out"){
    $sql_Insert = "INSERT INTO Work_Out (image,userID_Owner,dateOut,timeOut,who)
          VALUES ('".$photo."','".$owner_photo."','".$date."','".  $time."','".$who_tag."')";
    $status = true;
  }

  //Inset mysql_list_table
  if($status == true){
    if($connect ->query($sql_Insert) === TRUE){
      // echo "Insert Finished <br>";

      //Move image
      if (is_dir($dir)) {
          if ($dh = opendir($dir)) {
              while (($file = readdir($dh)) !== false) {
              // echo '<br>Archivo: '.$file;
                  if($file != "."){
                    if($file != ".."){
                      if($file == $photo){
                        // echo $file."==".$photo."<br>";
                        if (rename($dir.'/'.$file , $dirNew.'/'.$file)){
                          // echo " Files Move Successfully";
                          ?>
                          <html dir="ltr">
                           <head>
                             <meta charset="utf-8">
                             <link rel = "stylesheet" type = "text/css" href = "style.css" >
                             <title>Finished Tags Image</title>
                           </head>
                           <style>
                             body{
                               text-align: center;
                               font-size: 18px;
                             }
                             h1{
                               background-color:white;
                               color: black;
                               margin-top: 20%;
                               margin-left:-10px;
                               margin-right:-10px;
                               margin-bottom: 20%;
                               padding-top:20px;
                               padding-bottom:10px;
                               font-size: 60px;
                             }
                           </style>
                           <body><br><br><br><br>
                             <h1> <?php echo "ทำรายการแท็กภาพถ่ายเรียบร้อยแล้วค่ะ";?></h1>

                          <?php
                          echo "<script>setTimeout(\"location.href = 'non_tag.php';\",1500);</script>";
                        }else{
                          // echo "File Not Copy";
                        ?>
                         <h1> <?php echo "ไม่สามารถทำรายการแท็กภาพถ่ายได้!!! โปรดทำรายการใหม่อีกครั้งค่ะ";?></h1>

                      </body>
                      </html>
                        <?php
                        }
                      }
                   }
                 }
                } //close while
              closedir($dh);
          }
      }//end move image

      // header("Location: $Page");
    }else{
      echo "Can't Insert";
    }
  }
}
?>
