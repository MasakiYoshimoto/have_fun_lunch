<?php
  $records = array();
//CSVアップロード
//$filepath = "CSV/test.csv";
  $file_tmp_name = $_FILES["csvuproad"]["tmp_name"];//inputNameはformのname属性
  //$fileObject = new SplFileObject($file_tmp_name);
  //$fileObject->setFlags(SplFileObject::READ_CSV);
// ファイル内のデータループ
  //  foreach ($fileObject as $key => $line) {
    //  foreach( $line as $str ){
        //  $records[ $key ][] = $str ;
        //}
    //}
// 読み込み用にtest.csvを開きます。
$f = fopen($file_tmp_name,'r');
// test.csvの行を1行ずつ読み込みます。
while($line = fgetcsv($f)){
 // 読み込んだ結果を表示します。
 $records[] = $line;
}
// test.csvを閉じます。
fclose($f);
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CSVアップロード</title>
  </head>
  <body>
  <table>
    <tr>
      <th>従業員番号</th>
      <th>部署コード</th>
      <th>姓名</th>
      <th>パスワード</th>
      <th>メールアドレス</th>
    </tr>
      <?php foreach($records as $record) { ?>
        <tr>
          <td><?=$record[0]?></td>
          <td><?=$record[1]?></td>
          <td><?=$record[3].$record[2]?></td>
          <td><?=$record[4]?></td>
          <td><?=$record[5]?></td>
        </tr>
      <?php } ?>
  </table>
  </body>
</html>
