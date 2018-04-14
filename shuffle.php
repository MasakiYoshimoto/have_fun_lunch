<?php
require_once("Lib/require.php");
session_start();
$con = connect();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if(isset($_POST['shuffle'])){
    $grouplimit = getGroupLimit($con);
    $user_list = getUserInfo($con);
    $selected_users = array();
    $result = true;
    $group_id = 1;
    $errormsg = array();
    mysqli_autocommit($con, false);
    $result = resetUserGroup($con);
    if($result === false){
      $errormsg[] = 'グループの削除に失敗しました';
    }
    while (count($user_list) > 0){
      $selected_users = array();
    //wish_listの1行目のペアをとってくる
      $wish_list = getWishFirstPair($con);
    //$user_listからランダムでgrouplimt-wish_listペア分を引いた人数を取得
      //$rand_keys = array_rand($user_list, $grouplimit);
      //exit;
      //dd(is_null($wish_list));
      if(count($user_list) >= $grouplimit){
        $rand_keys = array_rand($user_list, (is_null($wish_list)=== false ) ? $grouplimit-2 : $grouplimit);
    //ペアとランダムを合わせて１セットにする
        if(is_null($wish_list) === false ){
          $selected_users[] = $wish_list['id_user_m'];
          $selected_users[] = $wish_list['id_user_w'];
        }
        foreach ($rand_keys as $value) {
          $selected_users[] = $user_list[$value]['id_user'];
        }
      }else{
        foreach ($user_list as $value) {
          $selected_users[] = $value['id_user'];
        }
      }
      //dd(is_null($wish_list), false);
      //セットになった人をgroup_userに挿入
      $result = insertUserGroup($con,$selected_users,$group_id);
        if($result === false){
        $errormsg[] = '追加に失敗しました';
      }
  //セットになった人をwish_listから削除する
      //dd(count($user_list), false);
      $result = deleteWishList($con, $selected_users);
      if($result === false){
        $errormsg[] = '希望リストからの削除に失敗しました';
      }
  //セットになった人を$user_listから削除する
      $user_list = deleteUserList($selected_users, $user_list);
      $group_id++;
    }
  // トランザクション成否判定
    if (count($errormsg) === 0) {
        // 処理確定
        mysqli_commit($con);
    } else {
        // 処理取消
        mysqli_rollback($con);
    }
  }
}
include_once 'admin.php';
?>
