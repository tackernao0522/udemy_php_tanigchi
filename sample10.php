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
// print(date('G')); // 何時の時

// if (date('G') < 9) {
//   print('※ 現在受付時間外です');
// } else {
//   print ('ようこそ');
// }

// $x = 0;  // 文字列の場合 空ではない場合=true / 空の場合=false  数字の場合 0=false, 0以外=true
// if ($x === 0) {
//   print ('xは0です');
// }
$x = 'abcdef';
// $xは文字列が入っていてtrueだがそのtrueを否定してfalseになるので表示されない
if (!$x) {
  print ('xは空です');
}
?>
</pre>
</main>
</body>    
</html>
