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
<pre>
  <!-- 'my_name'=name属性 セキュリティ htmlspacialcharsにはENT_QUOTES必ずつける -->
  お名前：<?php print(htmlspecialchars($_REQUEST['my_name'], ENT_QUOTES)); ?> <!-- $_REQUESTはpostでもgetでもどちらでも良い -->
</pre>
</main>
</body>    
</html>
