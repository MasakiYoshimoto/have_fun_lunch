<?php
require_once("Lib/require.php");
session_start();
$con = connect();
$display_name = getDisplayName($con);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="CSS/reset.css">
  <link rel="stylesheet" href="CSS/body.css">
  <link rel="stylesheet" href="CSS/animsition.min.css">
  <link rel="stylesheet" href="CSS/index.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="JS/animsition.min.js"></script>
  <title>Have Fun Lunch</title>
</head>
<body>
  <div class="animsition">
  <header>
    <h1>Have fun Lunch System</h1>
  </header>
  <div class="contents">
    <form class="form_login" action="<?php echo $display_name ?>.php" method="post">
      <table>
        <tr>
          <td><input type="text" class="id" name="id_user" value="" size="30" placeholder="従業員番号"></td>
        </tr>
          <td><input type="password" class="id" name="pass" value="" size="30" placeholder="パスワード"></td>
        </tr>
        <tr>
          <td><input type="submit" name="" value="ログイン" class="btn_hober"></td>
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
      <input type="button" value="管理画面" class="btn_hober" onclick="gate();">
      <script type="text/javascript">
         function gate() {
            var UserInput = prompt("パスワードを入力して下さい:","admin");
            location.href = "shuffle.php";
         }
      </script>
    </div>
  </div>
    <footer>
    <div class="footer_index">
      <a href="description0.html" class="animsition-link">Have Fun Lunchとは？</a>
    </div>
  <script>
  $(document).ready(function() {
    $('.animsition').animsition({
    outClass: 'fade-out-up-lg',
    inDuration: 1500,
    outDuration: 800,
    linkElement: '.animsition-link',
    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
    loading: false,
    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
    transition: function(url){ window.location.href = url; }
  });
  });
  </script>
  </footer>
</div>
</body>
</html>
