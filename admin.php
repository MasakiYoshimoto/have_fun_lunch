
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex">
    <title>管理画面（シャッフル）</title>
  </head>
  <body>
    <header>
      <h1>管理画面</h1>
    </header>
    <div class ="contents">
      <p>シャッフルボタン</p>
      <form action="shuffle.php" method="post">
        <input type="submit" name="shuffle" value="シャッフル">
      </form>
      <?php foreach ($errormsg as $value) { ?>
        <p><?php  print $value; ?></p>
      <?php } ?>
      <form action="selectpage.php" method="post">
        <div class ="chageview">
          <p>画面切り替え</p>
          <input type="submit" name="topview" value="応募受付画面">
          <input type="submit" name="selectview" value="希望選択画面">
          <input type="submit" name="resultsview" value="結果通知画面">
        </div>
      </form>
    </div>
  </body>
</html>
