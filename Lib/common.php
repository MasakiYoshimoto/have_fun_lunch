<?php
function dd($value, $is_exit = true ){
  var_dump($value);
  if($is_exit === true){
    exit;
  }
}
 ?>
