<?php session_start(); ?>
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
  <!-- ブラウザを閉じるとセッションは消える ウエブサーバーに値が保存される -->
<pre>
  <?php print($_SESSION['session_message']); ?>
</pre>
</main>
</body>
</html>
