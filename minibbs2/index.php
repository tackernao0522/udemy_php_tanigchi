<?php
session_start();
require('dbconnect.php');

if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
  // 1時間何もしていなければログアウト
  $_SESSION['time'] = time(); // 現在の時刻で上書き

  $members = $db->prepare('SELECT * FROM members WHERE id=?');
  $members->execute(array($_SESSION['id']));
  $member = $members->fetch();
} else {
  header('Location: login.php');
  exit();
}

if (!empty($_POST)) { // 投稿するがクリックされた時
  if ($_POST['message'] !== '') {
    $message = $db->prepare('INSERT INTO posts SET member_id=?, message=?, reply_message_id=?, created=NOW()');
    $message->execute(array(
      $member['id'], // データベースから取得した方がより確実である
      $_POST['message'], // name属性
      $_POST['reply_post_id'], // name属性
    ));

    header('Location: index.php'); // 重複しなくなる
    exit();
  }
}

$page = $_REQUEST['page'];
if ($page == '') { // パラメータが何も指定されなかった時
  $page = 1; // 1とする
}
$page = max($page, 1);

$counts = $db->query('SELECT COUNT(*) AS cnt FROM posts');
$cnt = $counts->fetch();
$maxPage = ceil($cnt['cnt'] / 5);
$page = min($page, $maxPage); // maxページにしかならない

$start = ($page - 1) * 5;

$posts = $db->prepare('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id ORDER BY p.created DESC LIMIT ?,5');
$posts->bindParam(1, $start, PDO::PARAM_INT);
$posts->execute();


if (isset($_REQUEST['res'])) { // REと言うリンクがクリックされた場合
  // 返信の処理
  $response = $db->prepare('SELECT m.name, m.picture, p.* FROM members m, posts p WHERE m.id=p.member_id AND p.id=?');
  $response->execute(array($_REQUEST['res']));

  $table = $response->fetch();
  $message = '@' . $table['name'] . ' ' . $table['message'];
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ひとこと掲示板</title>

  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div id="wrap">
    <div id="head">
      <h1>ひとこと掲示板</h1>
    </div>
    <div id="content">
      <div style="text-align: right"><a href="logout.php">ログアウト</a></div>
      <form action="" method="post">
        <dl>
          <dt><?php print(htmlspecialchars($member['name'], ENT_QUOTES)); ?>さん、メッセージをどうぞ</dt>
          <dd>
            <textarea name="message" cols="50" rows="5"><?php print(htmlspecialchars($message, ENT_QUOTES)); ?></textarea>
            <input type="hidden" name="reply_post_id" value="<?php print(htmlspecialchars($_REQUEST['res'], ENT_QUOTES)); ?>" />
          </dd>
        </dl>
        <div>
          <p>
            <input type="submit" value="投稿する" />
          </p>
        </div>
      </form>

      <?php foreach ($posts as $post) : ?>
        <div class="msg">
          <img src="member_picture/<?php print(htmlspecialchars($post['picture'], ENT_QUOTES)); ?>" width="48" height="48" alt="<?php print(htmlspecialchars($post['name'], ENT_QUOTES)); ?>" />
          <p><?php print(htmlspecialchars($post['message'], ENT_QUOTES)); ?><span class="name">（<?php print(htmlspecialchars($post['name'], ENT_QUOTES)); ?>）</span>[<a href="index.php?res=<?php print(htmlspecialchars($post['id'], ENT_QUOTES)); ?>">Re</a>]</p>
          <p class="day"><a href="view.php?id=<?php print(htmlspecialchars($post['id'], ENT_QUOTES)); ?>"><?php print(htmlspecialchars($post['created'], ENT_QUOTES)); ?></a>

            <?php if ($post['reply_message_id'] > 0) : ?>
              <a href="view.php?id=<?php print(htmlspecialchars($post['reply_message_id'], ENT_QUOTES)); ?>">
                返信元のメッセージ</a>
            <?php endif; ?>
            <?php if ($_SESSION['id'] == $post['member_id']) : ?>
              [<a href="delete.php?id=<?php print(htmlspecialchars($post['id'])); ?>" style="color: #F33;">削除</a>]
            <?php endif; ?>
          </p>
        </div>
      <?php endforeach; ?>

      <ul class="paging">
        <?php if ($page > 1) : ?>
          <li><a href="index.php?page=<?php print($page - 1); ?>">前のページへ</a></li>
        <?php else : ?>
          <li>前のページへ</li>
        <?php endif; ?>

        <?php if ($page < $maxPage) : ?>
          <li><a href="index.php?page=<?php print($page + 1); ?>">次のページへ</a></li>
        <?php else : ?>
          <li>次のページへ</li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</body>

</html>
