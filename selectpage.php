<?php
require_once("Lib/require.php");
session_start();
$con = connect();
$errormsg = array();
$selected_id = 0;


if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if(isset($_POST['topview'])){
    $selected_id = 1;
  }elseif (isset($_POST['selectview'])) {
    $selected_id = 2;
  }elseif(isset($_POST['resultsview'])){
    $selected_id = 3;
  }else{
    $selected_id = 0;
  }
  if($selected_id > 0 && $selected_id < 4 ){
    //アップデート処理をする
    $sql = "UPDATE table_setting
           SET current_id_display = '$selected_id'";
    $response = mysqli_query($con,$sql);
  }
}
header("location:shuffle.php");
exit();
 ?>
