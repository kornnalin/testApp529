<html lang="en" dir="ltr">
  <head>
    <title>Edit image Tagged</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "style.css" >
    </head>
    <style>
    img{
      width: 300px;
      height: auto;
      text-align: center;
    }
    </style>
    <body>
  <h2><b>แก้ไขภาพที่แท็กผิด</b></h2><br>

    </body>
</html>
<?php
if($_GET){
  $edit_tag = $_GET["edit"];
  // echo $edit_tag."<br>";
  ?>
  <div class="container">
      <center><img src="2019-01-30_12_44_21.jpg" alt="image" class="col-sm-4 col-md-4"></center>
      <center><div class="tag box" >
      <div>
          <input class="name" type="button" name="but1" value="พี่ประวิม">
          <input class="name" type="button" name="but2" value="พี่แอน">
      </div>
      <div>
          <input class="name" type="button" name="but3" value="พี่หมาย">
          <input class="name" type="button" name="but4" value="พี่นพดล">
      </div>
      <div>
          <input class="name" type="button" name="but5" value="พี่สานนท์">

      </div>
      <input class="name" type="submit" name="send" value="ยืนยันการแท็ก"
      style="border-radius:5px; background-color: rgb(60, 179, 113)">
          </br>
   </div></center>
   </div>
  <?php
}

?>
