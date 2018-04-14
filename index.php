<?php
require_once("Lib/require.php");
session_start();
$con = connect();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="CSS/reset.css">
  <link rel="stylesheet" href="CSS/body.css">
  <link rel="stylesheet" href="CSS/index.css">
  <title>Have Fun Lunch</title>
</head>
<body>
  <header>
    <h1>Have fun Lunch System</h1>
  </header>
  <div class="contents">
    <form class="form_login" action="top.php" method="post">
      <table>
        <tr>
          <td><input type="text" class="id" name="id_user" value="" size="30" placeholder="従業員番号"></td>
        </tr>
          <td><input type="password" class="id" name="pass" value="" size="30" placeholder="パスワード"></td>
        </tr>
        <tr>
          <td><input type="submit" name="" value="ログイン"></td>
      </table>
    </form>
      <?php
      if(!empty($_SESSION["error"]["msg"])){
      echo $_SESSION["error"]["msg"];
    }?>
    <div class="pic_dish">
      <p class="user_counts">
      <?php $user_counts=countsUser($con);
        echo LIMITJOIN-$user_counts;
      ?>
      <span>名</span></p>
    </div>
    <div class="management">
      <input type="button" value="管理画面" onclick="gate();">
      <script type="text/javascript">
         function gate() {
            var UserInput = prompt("パスワードを入力して下さい:","");
            location.href = UserInput + ".php";
         }
      </script>
    </div>
  </div>
    <footer>
    <div class="footer_infex">Have fun Lunch System とは?</div>
  </footer>

</body>

</html>
