<?php
session_start();
//エラー非表示中
ini_set("display_errors", 0);
ini_set("display_startup_errors", 0);

include_once ('codebird.php');
 
define('CONSUMER_KEY', '');
define('CONSUMER_SECRET', '');
 
//getRequestToken.php でセットした oauth_token と一致するかチェック
if (!isset($_SESSION['oauth_token']) || !isset($_REQUEST['oauth_token']) || ($_SESSION['oauth_token'] !== $_REQUEST['oauth_token']) || !(isset($_GET['oauth_verifier']) && isset($_SESSION['oauth_verify']))) {
    echo "認証していません\n";
    unset($_SESSION);
}
else{
    //おなじみのテンプレ
    \Codebird\Codebird::setConsumerKey(CONSUMER_KEY, CONSUMER_SECRET);
    $cb = \Codebird\Codebird::getInstance();
    $cb->setUseCurl(false);
     
    //認証が通った RequestToken を用いてAccessTokenを取得します
    $cb->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    unset($_SESSION['oauth_verify']);
    $reply = $cb->oauth_accessToken(array(
        'oauth_verifier' => $_GET['oauth_verifier']
    ));

    //AccessTokenが取得できなかったら、しぬ。
    if(!isset($reply->oauth_token) || !isset($reply->oauth_token_secret)){
        unset($_SESSION);
        echo "AccessTokenが取得できませんでした。RequestTokenが期限切れの可能性があります\n";
    }
    else{
        //手に入れたAccessTokenは今後ずっと使えるので大切にsessionに保管しておく
        $_SESSION['at'] = $reply->oauth_token;
        $_SESSION['ats'] = $reply->oauth_token_secret;
$at = $_SESSION['access_token'];
$ats =$_SESSION['access_token_secret'];
$cb->setToken($_SESSION['at'], $_SESSION['ats']);
$reply = $cb->account_verifyCredentials();
$name = $reply->name;
$user = $reply->screen_name;
$_SESSION['user'] = $user;
$_SESSION['name'] = $name;
$prof = $reply->profile_image_url;
$_SESSION['prof'] = $prof;
}}
?>
<!doctype html>
<html lang="ja">
<head>
<title>画像付きツイート</title>
<meta charset="utf8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="tw.css"/>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body>
			<ul id="sm">
				<li><a href="logout.php">ログアウト</a></li>
<li><a href="https://twitter.com" target="_blank">Twitter</a></li>
<li><a href="https://twitter.com/<?php echo $_SESSION['user']; ?>" target="_blank"><?php echo $_SESSION['name']; ?>さんのプロフィールを見る</a>
				<li class="cl">×CLOSE</li>
			</ul>
<?php

echo '
<div id="bar">
<span id="prv">
	<span id="smt">
		<img class="img" src="'.$_SESSION["prof"].'">
	</span>
</span>
<span class="text">'.
$_SESSION["name"].'<span class="at">[@'.$_SESSION["user"].']</span></span></div>';
echo'<div id="content">
';
$text=$_SESSION["mes"];
$leng=140-mb_strlen($text);
echo'<form method="post" action="post.php">
あと<span class="count">96</span>文字<br>
<textarea name="text">'.$text.'</textarea><br>
<div id="imgbox">添付する画像:<img src="data:image/jpg;base64,'.$_SESSION["base"].'" width=100><br></div>
<div id="bbox"><input type="submit" class="btn" value="ツイート"></div>
</form>';
?>
<br><br><br><br>文字数が超過している場合ボタンは押せません｡
</div>
<script type="text/javascript" src="menu.js">
</script><script type="text/javascript" src="count.js">
</script>
</body>
</html>