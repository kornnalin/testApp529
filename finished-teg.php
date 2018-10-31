<?php
include('tag.php');
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href = "firn-style.css" >
    <title>Finished Tags Image</title>
  </head>
  <style>
    body{
      text-align: center;
      font-size: 18px;
    }
    h1{
      background-color:white;
      margin-left:-10px;
      margin-right:-10px;
      padding-top:10px;
      padding-bottom:10px;
    }
    img{
      margin: auto;
    width: 30%;

    padding: 10px;
    }
  </style>
  <body>
      <?php
          $name_n1 = $_GET['n1'];
          $name_n2 = $_GET['n2'];
          $name_n3 = $_GET['n3'];
          $name_n4 = $_GET['n4'];
          $name_n5 = $_GET['n5'];
          echo $name_n1;
          $array_name = array($name_n1,$name_n2,$name_n3,$name_n4,$name_n5);
          // foreach ($array_name as $key => $value) {
          //   echo $value."<br>";
          //   if($value){
          //     //echo "<h1>แท็กภาพถ่าย </h1>".$value."<h1> เสร็จเรียบร้อยแล้ว</h1>";
          //     echo "1";
          //   }else {
          //     echo "2";
          //   }
          // }
       ?>
    <h1>แท็กภาพถ่ายเสร็จเรียบร้อยแล้ว</h1>
    <img src="cartoon.png" alt="">
  </body>
</html>
