<?php
  require_once("../Lib/require.php");
//SESSION開始
  session_start();
//DB接続
  $con = connect();
//TODO 現在の参加人数の取得
  $sql =  "SELECT id_user
          FROM t_join";
  $responce=mysqli_query($con,$sql);
  $result=mysqli_num_rows ($responce);
//TODO 参加人数が定員を超えているかを判定
if($responce>=LIMITJOIN){
//TODO 定員だった場合、定員に達したよメッセージ

}
//TODO 残枠あった場合、
else($responce<LIMITJOIN){
//t_joinにid_userを送る
  $now=date("Y-m-d H:i:s");
  $sql="INSERT INTO t_join(id_user,insert_date)
  VALUES('{$_SESSION['user_info']['id_user']}','{$now}')";
//$sqlをDBに投げる
  mysqli_query($con,$sql);
}

exit;
?>