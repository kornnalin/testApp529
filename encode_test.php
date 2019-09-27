<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Encode Decode</title>
  </head>
  <body>
    <form  action="encode_test.php" method="post">
        <select name="type">
            <option value="Encode">Encode</option>
            <option value="Decode">Decode</option>
        </select>
        Input :  <input type="text" name="str">
        <input type="submit" name="sub_send" value="Commit">
    </form>

  </body>
</html>

<?php
if(isset($_POST['type'])){
  $type = $_POST['type'];
  $str = $_POST['str'];
  echo $type." ".$str."<br>";
}
?>
//$_REQUEST
