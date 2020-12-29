<?php
session_start();

$_SESSION = array(); // sessionを切りたいので空の配列を上書きする
if (ini_set('session.use_cookies')) {
  $params = session_get_cookie_params();
  setcookie(
    session_name() . '',
    time() - 42000,
    $params['path'],
    $params['domain'],
    $params['secure'],
    $params['httponly']
  ); // 有効期限を切ると言うことでsessionを切る
}
session_destroy();

setcookie('email', '', time()-3600); // cookieに保存されているメールアドレスを削除

header('Location: login.php');
exit();
?>
