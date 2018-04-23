<?php
require_once("Lib/require.php");
session_start();
$con = connect();
$user_info = getLoginUser($con,$_POST["id_user"],$_POST["pass"]);
// ログイン判定
if(empty($user_info)){
//失敗だった場合
//エラーメッセージを作成
$_SESSION["error"]["msg"]="ログイン失敗しました。";
//前の画面に遷移
header("location:index.php");
exit();
}
//成功だった場合
if(!empty($_SESSION["error"]["msg"])){
unset($_SESSION["error"]["msg"]);
}
$_SESSION['user_info'] = $user_info;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/results.css">
    <title>MyPage／結果</title>
  </head>
<body>
<header>
<img class="mypage2" src="img/mypage2.png" alt="マイページ" title="マイページ">
<a href="logout.php" class="logout"><img src="img/logout.png" alt="ログアウト"></a>
</header>
<table class="list_join_users">
  <caption>今月のグループはこちらの4名です！</caption>
  <tr class = "toptr">
    <th>従業員番号</th>
    <th>部署</th>
    <th>氏名</th>
  </tr>
<?php
  $list = getResults($con);
  foreach($list as $value) {?>
<tr>
  <td><?=$value['user_id']?></td>
  <td><?=$value['section_name']?></td>
  <td><?=$value['last_name'].$value['first_name']?></td>
</tr>
<?php } ?>
</table>
<footer>
<img class="hfl2" src="img/hfl2.png" alt="ロゴ" title="ロゴ">
<div class="under_footer"></div>
</footer>
  </body>
</html>
