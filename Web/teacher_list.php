<?php//sotukenサーバー用のDB情報
//require_once("server_config.php");
//ローカル用のサーバー情報
require_once("localhost_config.php");
?>
<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link href="contents.css" rel="stylesheet" media="all">
    <title>MariaDBへの接続テスト</title>
</head>

<body>
<!--戻るのリンク-->
<a href="teacher_list.html">戻る</a><br>
<H1 align="left">教員一覧</H1><br>
    <?php
//require_once('main_config.php');
require_once('localhost_config.php');
try{
  $dbh = new PDO(DSN, DB_USER, DB_PASS);
 var_dump($dbh);
  $sql = 'select * from teacher';
?>
<div id='style table'>
<table border="1" align="center">
  <tr>
  <th>教員番号</th>
  <th>名前</th>
  <th>パスワード</th>
  <th>権限</th>
  </tr>

  <?php
  foreach ($dbh->query($sql) as $row) { ?>
    <tr>
    <td><?php print($row['教員番号']);?>
    <td><?php print($row['名前']);?>
    <td><?php print($row['パスワード']);?>
    <td><?php print($row['権限']);?>
    </tr>
      <?php
    }
    ?>
    </table>
    <?php
}catch (PDOException $e){
  print('Error:'.$e->getMessage());
  die();
}
$dbh = null;
?>
</body>

</html>