<?php
  require_once("../Lib/require.php");
//SESSION開始
  session_start();
  $join_result = array(
    "result_code" => 0,
    "message" => ""
  );
//DB接続
  $con = connect();
//現在の参加人数の取得
  $sql =  "SELECT id_user
          FROM t_join";
  $response=mysqli_query($con,$sql);
  $join_user_counts=mysqli_num_rows ($response);
//参加人数が定員を超えているかを判定
if($join_user_counts>=LIMITJOIN){
//TODO 定員だった場合、定員に達したよメッセージ
  $join_result["result_code"] = 1;
  $join_result["message"] = "※定員に達したため参加を受け付けることができませんでした。またのご参加をお待ちしております".LIMITJOIN;
}else {
  if($_POST['dbtype']==1){
    $now=date("Y-m-d H:i:s");
    $sql="INSERT INTO t_join(id_user,insert_date)
          VALUES('{$_SESSION['user_info']['id_user']}','{$now}')";
    mysqli_query($con,$sql);
    $join_result["result_code"] = 0 ;
    $join_result["message"] = "定員じゃないよ";
  }else {
    delete_join_user($con,$_SESSION['user_info']['id_user']);
    $join_result["result_code"] = 0 ;
    $join_result["message"] = "取り消し完了";
  }
}
//TODO 残枠あった場合、
// else if($responce<LIMITJOIN){
// //t_joinにid_userを送る
//   $now=date("Y-m-d H:i:s");
//   $sql="INSERT INTO t_join(id_user,insert_date)
//   VALUES('{$_SESSION['user_info']['id_user']}','{$now}')";
// //$sqlをDBに投げる
//   mysqli_query($con,$sql);
//   $join_result["message"] = "参加を受け付けました。メンバー通知をお待ちください。";
// }
echo json_encode($join_result, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
exit();
?>
