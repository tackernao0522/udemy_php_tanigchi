<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="../css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>
</header>

<main>
<h2>Practice</h2>
<?php
try {
  $db = new PDO('mysql:dbname=mydb2;host=localhost;port=8889;charset=utf8', 'root', 'root');
} catch(PDOException $e) {
  echo 'DB接続エラー: ' . $e->getMessage();
}
// exec 影響を与えた行の数を返す
// $count = $db->exec('INSERT INTO my_items SET maker_id=1, item_name="ぶどう", price=550, keyword="紫,甘い,美味しい"');
// echo $count . '件のデータを挿入しました';

// query select構文の得られた値を受け取る
// $records = $db->query('SELECT * FROM my_items');
// while ($record = $records->fetch()) {
//   print($record['item_name'] . "\n");
// }

$memos = $db->query('SELECT * FROM memos ORDER BY id DESC');
?>

<article>
  <?php while ($memo = $memos->fetch()): ?>
    <p><a href="memo.php?id=<?php print($memo['id']); ?>"><?php print(mb_substr($memo['memo'], 0, 50)); ?></a></p>
    <time><?php print($memo['created_at']); ?></time>
    <hr>
  <?php endwhile; ?>
</article>
</main>
</body>
</html>