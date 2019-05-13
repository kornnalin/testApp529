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
      width: 200px;
      height: auto;
      text-align: center;
    }
    input{
      font-family: 'TH Sarabun New', Times, Arial, Helvetica, sans-serif;
      text-align: center;
      border: none;
      font-weight: bold;
      width: 100%;
    }
    </style>
    <body>
  <h2><b>แก้ไขภาพที่แท็กผิด</b></h2><br>

    </body>
</html>
<?php
if($_GET){
  $edit_tag = $_GET["edit"];
  //echo $edit_tag."<br>";
  ?>
  <div class="container">
      <center><img src="image/2019-03-20_17_14_12.jpg" alt="image" class="col-sm-4 col-md-4"></center>
    <div class="container">
      <h3><b>เจ้าของภาพ : <?php echo $edit_tag ?></b></h3>
    <form>
        <div class="choose_status" style="text-align:left; padding:0px;">
          <label><b>แก้ไขเจ้าของภาพเป็น : </b></label>
          <select  id="edit_tag" name ="edit_tag">
            <option></option>
            <option name="CP01">พี่ประวิม</option>
            <option name="CP02">พี่แอน</option>
            <option name="CP03">พี่หมาย</option>
            <option name="CP04">พี่นพดล</option>
            <option name="CP05">พี่สานนท์</option>
          </select>
          <!-- <input class="name" style="margin-top:10px; background-color:white;" type="submit" name="send_status" value="ยืนยัน"> -->
          <input class="choose_status" style="margin-top: 10px;  " type="submit" name="send_status" value="ยืนยัน">
        </div>
    </form>
  </div>
   </div>
  <?php
}

?>
