<?php
require_once("Lib/require.php");
session_start();
$con = connect();

//TODO POSTを受け取る

//TODO POSTが空だった場合、エラメ表示
  if(empty($_POST['id']) ){
    $_SESSION['error']['all']['error_msg'] = "ユーザー情報を入力してください。";
  } else {
//TODO POSTのidをt_joinと照合
  $sql = getTjoinUserInfo($_POST['id']);
//TODO t_joinになかった場合、エラメ表示
  if(empty($_SESSION['error']['all']) && empty($_SESSION['id_user'])){ // セッションデータにユーザーIDがあるか確認
    $_SESSION['error']['user_id']['error_msg'] = "入力された「id」は登録されていません。";
    }
  }
//TODO t_joinにあった場合、wish_listに挿入
  $sql = InsertWishList();


 ?>
