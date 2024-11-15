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
// %02d月 2=2桁で表すの意味である 0=2桁目がない場合は0で補うの意味 d=数字という型であるチェック * 0ではなく半角にするとその分の半角が入る 文字の場合は=s
$date = sprintf('%04d年 % 2d月 % 2d日 %s', 1969, 12, 5, '金');
print($date);
?>
</pre>
</main>
</body>    
</html>
