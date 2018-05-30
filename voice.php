<?php session_start();?><!doctype html>
<html lang="ja">
<head>
<title>画像付きツイート</title>
<meta charset="utf8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="master.css"/>
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
$text='JR西日本みたいな駅名標作りました
→generate.cutls.com #cutls';
$leng=140-mb_strlen($text);
echo'<form method="post">
あと<span class="count">'.$leng.'</span>文字<br>
<textarea name="text">'.$text.'</textarea>
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