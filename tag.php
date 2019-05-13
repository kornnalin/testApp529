<?php
session_start();
include("connectDB.php");

if($_SESSION['Photo']){
$image = $_SESSION['Photo'];
  // echo $_SESSION['Photo'];

$getNickName = array();
$getUserId = array();
$i = 0;
$sql = "SELECT * FROM User";
  if($query = mysqli_query($connect,$sql)){
    while($row = mysqli_fetch_array($query)){
      $getNickName[$i] = $row['nickName'];
      $getUserId[$i] = $row['userID'];
      $i++;
    }
  }

  ?>
  <html dir="ltr">
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
          input{
            font-family: 'TH Sarabun New', Times, Arial, Helvetica, sans-serif;
            text-align: center;
            border: none;
            font-weight: bold;
            width: auto;
          }

          button:hover{
            background-color: rgb(255,145,0);
            color: black;
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
      <div class="container">
          <center><img src="image/<?php echo $image; ?>" alt="<?php $image; ?>" class="col-sm-4 col-md-4"></center>
          <center>
            <div class="tag box" >
            <?php
              foreach ($getNickName as $key => $name) {
                  echo "<a href='tag_check.php?own=",urlencode($getUserId[$key]),"'>".'<button class="name" type="button" name="'.$getUserId[$key].'" style="color:black;"><b>'.$name.'</b></button></a>';
              }
             ?>
            <!-- <br>
            <input class="name" type="submit" name="send" value="ยืนยันการแท็ก" id="selectsubmit" style="border-radius:5px; background-color: rgb(60, 179, 113);"/>

            </br> -->
            </div>
          </center>

     </div>
    </form>

    </body>
  </html>
<?php
}
?>
