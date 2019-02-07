
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <title>Tag Member</title>
    <link rel="stylesheet" href="fonts/thsarabunnew.css" />
    <link rel = "stylesheet" type = "text/css" href = "style.css" >
    <style>

      h1{
        text-align: center;
        font-size: 40px;
      }
      .name{
        font-size: 40px;
        border: 1px solid black;
        border-radius:5px;
        margin: 10px;
        margin-left: 5px;
        margin-right: 5px;
        padding-left: 10px;
        padding-right:10px;
        background-color: lightgray;
        font-family: 'TH Sarabun New', Times, Arial, Helvetica, sans-serif;
        text-align: center;
      }
        .tag{
          width:100%;
          margin: auto;
        }

        .box{
          /* border: 1px solid black; */
          border-radius:5px;
          /* background-color: black; */

        }
        input{
          font-family: 'TH Sarabun New', Times, Arial, Helvetica, sans-serif;
          text-align: center;
          border: none;
          font-weight: bold;
          width: 100%;
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
        <div class="tag box" >
        <div class="col-sm-4 col-md-4">
            <input class="name" type="button" name="but1" value="พี่ประวิม">
            <input class="name" type="button" name="but2" value="พี่แอน">
        </div>
        <div class="col-sm-4 col-md-4">
            <input class="name" type="button" name="but3" value="พี่หมาย">
            <input class="name" type="button" name="but4" value="พี่นพดล">
        </div>
        <div class="col-sm-4 col-md-4">
            <input class="name" type="button" name="but5" value="พี่สานนท์">
            <input class="name" type="submit" name="send" value="ยืนยันการแท็ก"
            style="border-radius:5px; background-color: rgb(60, 179, 113)">
        </div>
            </br>
     </div>
     </div>
    </form>
    <script>

    document.getElementById('id').
    $(document).ready(function(){
         $("input").mouseenter(function(){
               $(this).css("color","green");
               $(this).css("background-color", "rgb(255, 255, 71)");
         });
         $("input").mouseleave(function() {
               $(this).css("color","black");
               $(this).css("background-color", "lightgray");
         });
       });
    </script>
  </body>
</html>
