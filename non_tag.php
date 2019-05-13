<!DOCTYPE html>
<html>
  <head>
    <title>Tag Image</title>
    <meta charset="utf-8">
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
        font-size: 40px;
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
    <h2><b>สถานะการแท็กภาพถ่าย<b></h2>
      <h3><b>ภาพที่ยังไม่ได้แท็ก</b></h3>
<?php
include("connectDB.php");
include("image_folder1.php");

session_start();
$UserID = $_SESSION["userid"];
// echo $UserID."<br>";

//Sort Image
$today = date("Y-m-d");
// echo "Today ".$today."<br>";
$this_day = substr($today,8,2);
// echo $this_day."<br>";


$min_day;
$index_min_day;
sort($image_name);
foreach ($image_name as $key => $value) {
// echo $value."<br>";
}

// echo $min_day."<br>";
foreach ($image_name as $image) {
  // echo $image."<br>";
  ?>
  <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-3 col-lg-3" >
        <?php
            echo '<center>'."<a href='login.php?img=",urlencode($image),"'>".'<img src="image/'.$image.'" alt="'.$image.'" border="0" /></a></center>';
            // echo "<a href=tag.php?img=",urlencode($image),">$image</a>";
            // echo $image."<br>";
          ?>
        </div>
      </div>
    </div>
<?php
}
?>
  </body>
</html>
