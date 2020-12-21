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
<!-- 剰余算
10 / 3 = 3 ... 1
10 % 3 = 1

2 % 1 = 0

0 % 2 = 0
1 % 2 = 1
2 % 2 = 0
3 % 2 = 1
4 % 2 = 0

0 % 3 = 0
1 % 3 = 1
2 % 3 = 2
3 % 3 = 0
4 % 3 = 1
5 % 3 = 2
6 % 3 = 0 -->
<table>
    <?php
    for ($i=1; $i <= 100; $i++) {
      if ($i % 2) { // trueの場合 background-colorが付く 0=false それ以外の数値=true
        print('<tr style="background-color: #ccc">');
      } else { // falseの場合 background-colorが付かない 0になるのでfalse
        print('<tr>');
      }
      print('<td>' . $i . '行目</td>');
      print('</tr>');
    }
    ?>
</table>
</main>
</body>
</html>
