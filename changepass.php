<?php
require_once("Lib/require.php");
session_start();
$con = connect();

$oldpass ='';
$newpass ='';
$confirmpass ='';
$response = false;
$errormsg = array();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  if(isset($_POST['oldpass'])){
    $oldpass = $_POST['oldpass'];
  }
  if(isset($_POST['newpass'])){
    $newpass = $_POST['newpass'];
  }
  if(isset($_POST['confirmpass'])){
    $confirmpass = $_POST['confirmpass'];
  }
  //空白ならエラーメッセージ表示
  if(mb_strlen($oldpass) === 0){
    $errormsg[] = '旧パスワードを入力してください。';
  }
  if(mb_strlen($newpass) === 0){
    $errormsg[] = '新パスワードを入力してください。';
  }
  if(mb_strlen($confirmpass) === 0){
    $errormsg[] = '新パスワード（確認用）を入力してください。';
  }
//旧PASSがデータと一致しているかを確認する
//旧ｐASSが一致し$ていない＞エラーメッセージ表示
  $currentpass = getpassword($con);
  if($currentpass !== $oldpass){
    $errormsg[] = '旧パスワードが誤っています。';
  }
//旧PASSが一致している
//新PASSが確認用と一致しているかを確認する
//新PASSが確認用と一致していない＞エラーメッセージ表示
  if($newpass !== $confirmpass){
    $errormsg[] = '新パスワードが一致しません。';
  }
//新PASSが確認用と一致している＞PASS書き換え
  if(count($errormsg) === 0){
    $response = changepass($con, $newpass);
  }
}
?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="CSS/reset.css">
     <link rel="stylesheet" href="CSS/body.css">
     <link rel="stylesheet" href="CSS/changepass.css">
     <title>パスワード変更</title>
   </head>
   <body>
     <header>
       <h1>Have Fun Lunch System</h1>
       <div class ="logout">
         <a href="logout.php"><img src="img/logout.png" alt="ログアウト"></a>
       </div>
     </header>
     <div class="contents">
       <?php foreach ($errormsg as $key => $value) {
         print $value;
       }?>
       <?php if($response === true){
         print 'パスワードの変更が完了しました。';
       }?>
       <form class="form_login" action="changepass.php" method="post">
         <table>
         <tr>
           <td><input type="password" class="id" name="oldpass" value="" size="30" placeholder="旧パスワード"></td>
         </tr>
         <tr>
           <td><input type="password" class="id" name="newpass" value="" size="30" placeholder="新パスワード"></td>
         </tr>
         <tr>
           <td><input type="password" class="id" name="confirmpass" value="" size="30" placeholder="新パスワード"></td>
         </tr>
             <td><input type="submit" name="" value="change password"></td>
         </table>
       </form>
   </body>
 </html>
