<?php
session_start();
require_once ('codebird.php');
 if(isset($_POST["img"])){

 }else{
	 $_SESSION["mes"]="JR西日本みたいな駅名標作りました
→ g.cutls.com #cutls";
$_SESSION["flag"]="/";
 }
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
 
//ConsumerKey&Secretの情報を元に、RequestTokenを取得します。
$reply = $cb->oauth_requestToken(array(
    'oauth_callback' => CALLBACK_URL
));
 
//何らかの原因でRequestTokenが手に入らなかったら、しぬ。
if(!isset($reply->oauth_token) || !isset($reply->oauth_token_secret)){
    echo "error: gettk.php\n";
    exit;
}
 
//得たRequestTokenは「$変数名->oauth_token」「$変数名->oauth_secret」に入っている
$cb->setToken($reply->oauth_token, $reply->oauth_token_secret);
$_SESSION['oauth_token'] = $reply->oauth_token;
$_SESSION['oauth_token_secret'] = $reply->oauth_token_secret;
$_SESSION['oauth_verify'] = 1;
 
//$cb->setToken()を用いてRequestTokenを設定したので、認証URLを作成し、リダイレクトする
$auth_url = $cb->oauth_authorize();
header('Location: ' . $auth_url);
?>