<?php session_start();?>
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
    <img class="pic_dish" src="img/index.png" alt="カウンター" title="カウンター">
  </div>
    <footer>
    <div class="footer_infex">Have fun Lunch System とは?</div>
  </footer>

</body>

</html>
