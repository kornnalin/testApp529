<?php
$image_name = array();
$n = 0;

$handle = opendir(dirname(realpath(__FILE__)).'/image/');
  while($file = readdir($handle)){
    if($file !== '.' && $file !== '..'){
      // echo '<img src="image/'.$file.'" alt="'.$file.'" border="0" />';
      // echo "<center>".$file."</center><br>";
      $image_name[$n] = $file;
      $n++;
    }
  }
  ?>
