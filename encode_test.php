<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Encode Decode</title>
  </head>
  <body>
    <form  action="encode_test.php" method="post">
        <select name="type">
            <option value="----Selest Option----"></option>
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
  if ($type == '----Selest Option----') {
    echo "Select Option and Yor Input";
  }else if(isset($str)){
      if($type == 'Encode'){
          $encode_str = base64_encode($str);
          echo $type." : <br>";
          echo $encode_str;
      }else if($type == 'Decode'){
          $decode_str = base64_decode($str);
          echo $type." : <br>";
          echo $decode_str;
      }
  }
}
?>
