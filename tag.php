<?php
session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tag Member</title>
    <link rel="stylesheet" href="fonts/thsarabunnew.css" />
    <link rel = "stylesheet" type = "text/css" href = "firn-style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    <style>

      h1{
        text-align: center;
        font-size: 60px;
      }
      h3{
        font-size: 50px;
        border: 1px solid black;
        border-radius:5px;
        margin: 10px;
        margin-left: 5px;
        margin-right: 5px;
        padding-left: 15px;
        padding-right:15px;
        background-color: lightgray;
      }
        .tag{
          width:60%;
          margin: auto;
        }

        .box{
          border: 1px solid black;
          border-radius:5px;
          background-color: white;
        }
        .but{
          text-align: center;
          border: none;
          background-color: white;
        }
    </style>
  </head>
  <body>
    <h1><b>แท็กสมาชิก</b></h1>
    <form action="finished-teg.php" method="GET" >
      <div class="tag box">
        <h3 id="n1" name="n1" onclick="myFunction()">พี่ประวิม</h3>
        <h3 id="n2" name="n2">พี่แอน</h3>
        <h3 id="n3" name="n3">พี่หมาย</h3>
        <h3 id="n4" name="n4">พี่นพดล</h3>
        <h3 id="n5" name="n5">พี่สานนท์</h3>

        <!-- <button class="name" type="button" name="but1">พี่ประวิม</button>
        <button class="name" type="button" name="but2">พี่แอน</button>
        <button class="name" type="button" name="but3">พี่หมาย</button>
        <button class="name" type="button" name="but4">พี่นพดล</button>
        <button class="name" type="button" name="but5">พี่สานนท์</button> -->

        <div class="but" ><input type="submit" name="send" value="ยืนยันการแท็ก" style="font-size:50px;
          border-radius:5px; background-color: rgb(60, 179, 113)"></div>
        </br>
      </div>
    </form>
    <script>

     function myFunction(){

     }

    document.getElementById('id').
    $(document).ready(function(){
         $("h3").mouseenter(function(){
               $(this).css("color","green");
               $(this).css("background-color", "rgb(255, 255, 71)");
         });
         $("h3").mouseleave(function() {
               $(this).css("color","black");
               $(this).css("background-color", "lightgray");
         });
       });



    </script>
  </body>
</html>
