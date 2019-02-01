
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Tag Member</title>
    <link rel="stylesheet" href="fonts/thsarabunnew.css" />
    <link rel = "stylesheet" type = "text/css" href = "firn-style.css" >


    <style>

      h1{
        text-align: center;
        font-size: 60px;
      }
      .name{
        font-size: 50px;
        border: 1px solid black;
        border-radius:5px;
        margin: 10px;
        margin-left: 5px;
        margin-right: 5px;
        padding-left: 15px;
        padding-right:15px;
        background-color: lightgray;
        font-family: 'TH Sarabun New', Times, Arial, Helvetica, sans-serif;
        text-align: center;
      }
        .tag{
          width:60%;
          margin: auto;
        }

        .box{
          border: 1px solid black;
          border-radius:5px;
          background-color: white

        }
        .but,input{
          font-family: 'TH Sarabun New', Times, Arial, Helvetica, sans-serif;
          text-align: center;
          border: none;
          font-weight: bold;
        }
        img{
          width: 300px;
          height: auto;
          text-align: center;
        }
    </style>
  </head>
  <body>
    <h1><b>แท็กเจ้าของภาพถ่ายกันเถอะ</b></h1><br>
    <form action="finished-teg.php" method="post">
    <div class="container">
        <center><img src="2019-01-30_12_44_21.jpg" alt="image" class="col-sm-4 col-md-4"></center>
        <div class="col-sm-7 col-md-7 tag box" style="background-color:black">
            <button class="name" type="button" name="but1"><b>พี่ประวิม</b></button>
            <button class="name" type="button" name="but2"><b>พี่แอน</b></button>
            <button class="name" type="button" name="but3"><b>พี่หมาย</b></button>
            <button class="name" type="button" name="but4"><b>พี่นพดล</b></button>
            <button class="name" type="button" name="but5"><b>พี่สานนท์</b></button>

            <div class="but" >
            <input type="submit" name="send" value="ยืนยันการแท็ก" style="font-size:50px;
              border-radius:5px; background-color: rgb(60, 179, 113)">
            </div>
            </br>
        </div>
     </div>
    </form>
    <script>

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
