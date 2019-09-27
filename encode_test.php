<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Encode Decode</title>
  </head>
  <body>
    <select name="type">
        <option value="Encode"></option>
        <option value="Decode"></option>
    </select>
    <form  action="encode_test.php" method="post">
      Input :  <input type="text" name="str_encode">
      <input type="submit" name="sub_send" value="Commit">
    </form>

  </body>
</html>

<?php
$type = $_REQUST['type'];
$str = $_REQUST['str_encode'];
if($type){
  echo $type.'\n';
}
if ($str) {
  $str = 'This is an encoded string';
  echo base64_encode($str);
}

?>
