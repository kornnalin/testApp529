<?php
// echo "show image<br>";
include("connectDB.php");
session_start();
$userid = $_SESSION['who'];
$name = $_SESSION['name'];
// echo $userid."<br>";
// echo $name."<br>";

if($_REQUEST){
  $img_enter = $_REQUEST['img1'];
  $img_out = $_REQUEST['img2'];
  $date = $_REQUEST['date'];
  // echo $img_enter."<br>";
  // echo $img_out."<br>";
  // echo $date."<br>";

  $thaiMonth = array( "01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน",
                    "05" => "พฤษภาคม","06" => "มิถุนายน", "07" => "กรกฎาคม", "08" => "สิงหาคม",
                    "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม");
  $mount="";
  foreach ($thaiMonth as $key => $value) {
    if($key == (substr($date,5,2))){
      $mount = $value;
    }
  }
  // echo $mount."<br>";
//edit date format
$new_date = substr($date,8,2)."  ".$mount."  ".substr($date,0,4);
// echo $new_date."<br>";
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Show Image</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "style.css" >
  </head>
  <style>
      h2{
        text-align: center;
        margin-bottom: -20px;
        font-size: 30px;
        color: blue;
      }
      img{
        width: 50%;
        height: 30%;
        margin: auto auto;
        display: block;
        padding: 5px;
      }
      h4{
        margin-top: -3px;
        text-align: center;
      }
      .firn{
        border:1px solid black;
      }
  </style>
  <body>
    <center>
    <div class="container">
        <div class="row">
          <br><br>
          <h2><b>วันที่ <?php echo $new_date; ?></b></h2><br>
          <?php
          if($img_enter){?>
            <h3><b>เวลาขาเข้า <?php echo (substr($img_enter,11,8)); ?></b></h3>
            <div class="col-sm-4 col-md-3 col-lg-3" >
            <?php  echo '<center>'.'<img src="imageTag/'.$userid.'/'.$img_enter.'" alt="'.$userid.'" border="0" /></a></center>';?>
            </div>
          <?php }

           if($img_out){
           ?>
            <h3><b>เวลาขาออก <?php  echo (substr($img_out,11,8)); ?></b></h3>
            <div class="col-sm-4 col-md-3 col-lg-3" >
            <?php  echo '<center>'.'<img src="imageTag/'.$userid.'/'.$img_out.'" alt="'.$userid.'" border="0" /></a></center>';?>
          </div>
          <?php } ?>
       </div>
    </div>
  </center>
  <?php
  }else{
    ?>
     <h1> <?php echo $message_error;?></h1>
    <?php
    echo "<script>setTimeout(\"location.href = 'timestamp_user.php';\",1500);</script>";
  }
 ?>
  </body>
</html>
<?php
