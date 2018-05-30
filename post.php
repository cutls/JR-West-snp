<?php
session_start();
require_once ('codebird.php');
// api 登録して取得した文字列を入れます
define('CONSUMER_KEY', '');
define('CONSUMER_SECRET', '');
//define('CALLBACK_URL', '認証後にリダイレクトして欲しいURLを指定します(今回はindex.phpです)');
define('CALLBACK_URL', 'http://g.cutls.com/jr/login.php');
 
//テンプレ
\Codebird\Codebird::setConsumerKey(CONSUMER_KEY, CONSUMER_SECRET);
$cb = \Codebird\Codebird::getInstance();
//curlを使うと不具合が起こるという場合は以下を指定するとfile_get_contentsを用いて通信するようになります。
//$cb->setUseCurl(false);
$cb->setToken($_SESSION['at'], $_SESSION['ats']);
$status = $cb->media_upload(array(
    'media_data' => $_SESSION["base"]
));
$media=$status->media_id;
$status = $cb->statuses_update(array(
    'media_ids' => $media,
    'status' => $_POST["text"]
));
header('Location: '.$_SESSION["flag"]);
?>