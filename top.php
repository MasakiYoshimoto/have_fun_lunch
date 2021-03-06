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
    <link rel="stylesheet" href="CSS/body.css">
    <link rel="stylesheet" href="CSS/top2.css?<?php print date('YmdHis'); ?>">
    <title>top-page-havefunlunch</title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="JS/top.js"></script>
  </head>
  <body>
  <header>
    <img class="mypage" src="img/mypage.png" alt="mypage" title="mypage">
    <div class="changepass">
      <a href="changepass.php"><img src="img/pass.png" alt="パスワード変更"></a>
    </div>
    <div class ="logout">
      <a href="logout.php"><img src="img/logout.png" alt="ログアウト"></a>
    </div>
  </header>
  <div class="contents">
    <?="こんにちは ".$user_info["last_name"].$user_info["first_name"]." さん";?>
  </div>
    <?php
      if(exist_join_user($con,$_SESSION['user_info']['id_user'])){
        $join_button_msg = "参加を希望する";
        $dbtype = 1;
      }else {
        $join_button_msg = "参加を取り消す";
        $dbtype = 0;
      }
      ?>
      <input id="dbtype" type="hidden" name="" value="<?php echo $dbtype ;?>">
      <div class ="join_button"><?php echo $join_button_msg ; ?></div>
      <div class="results_msg"></div>
      <img class="jointothelunch" src="img/jointothelunch.png" alt="ﾊﾝﾊﾞｰｰｶﾞｰ" title="ﾊﾝﾊﾞｰｶﾞｰ">
    <footer>
    </footer>
  </body>
</html>
