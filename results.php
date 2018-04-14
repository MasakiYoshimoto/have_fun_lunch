<?php
require_once("Lib/require.php");
session_start();
$con = connect();
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
<img class="mypage2" src="img/mypage2.png" alt="マイページ" title="マイページ">
<table class="list_join_users">
<caption>今月の参加者リスト</caption>
<tr>
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
