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
print (date('n/j(D)', time() + 60 * 60 * 24));
?>
</pre>
</main>
</body>
</html>
