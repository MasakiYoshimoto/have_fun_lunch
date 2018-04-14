<?php
require_once("Lib/require.php");
session_start();
$con = connect();
//TODO POSTを受け取る
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
//TODO POSTが空だった場合、エラメ表示
    if(isset($_POST['id_user_w']) === false){
      $_SESSION['error']['all']['error_msg'] = "ユーザー情報を入力してください。";
    } else {
//TODO POSTのidをt_joinと照合
      $id_user_w = getTjoinUserInfo($con,(int)$_POST['id_user_w']);
//TODO t_joinになかった場合、エラメ表示
      if($id_user_w === 0){  // セッションデータにユーザーIDがあるか確認
        $_SESSION['error']['user_id']['error_msg'] = "入力された「id」は登録されていません。";
      } else {
  //TODO t_joinにあった場合、wish_listに挿入
        $sql = InsertWishList($con,$id_user_w);
      }
    }
  }
  header("location:select.html");
  exit();
 ?>
