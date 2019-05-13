<?php



if($_REQUEST['own']){
$photo_owner = $_REQUEST['own']; //เจ้าของภาพ
// echo $photo_owner."<br>";

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
      margin-top: 10%;
      margin-left:-10px;
      margin-right:-10px;
      margin-bottom: 20%;
      padding-top:10px;
      padding-bottom:10px;
      font-size: 60px;
    }
    img{
      width: 50%;
      height: auto;
      margin: auto auto;
      display: block;
      padding: 5px;
    }
  </style>
  <body>

    <h1>แท็กภาพถ่ายเสร็จเรียบร้อยแล้ว</h1>
    <?php
    echo '<center>'.'<img src="image/'.$photo.'" alt="'.$photo.'" border="0" /></a></center>';
    ?>
  </body>
</html>
<?php
}
 ?>
