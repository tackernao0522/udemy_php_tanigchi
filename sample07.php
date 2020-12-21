<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/style.css">

<title>PHP</title>
</head>
<body>
<header>
<h1 class="font-weight-normal">PHP</h1>
</header>

<main>
<h2>Practice</h2>
<pre>
<?php
// print (time() + 60 * 60 * 24); // 60秒 * 60分 * 24時間 次の日の意味になる
// for ($i = 1; $i <=1000; $i++) :
//   $date = strtotime('+' . $i . 'day');
//   $week_name = ['日', '月', '火', '水', '木', '金', '土'];
//   print (date('n/j' . '(' . $week_name[date("w", $date)] . ')', $date));
//   print "\n";
// endfor;

for ($i = 1; $i <=365; $i++) :
  $date = strtotime('+' . $i . 'day');
  $week_name = ['日', '月', '火', '水', '木', '金', '土'];
  print (date("n/j({$week_name[date("w", $date)]})", $date));
  print "\n";
endfor;
?>
</pre>
</main>
</body>
</html>
