<?php
session_start();
?><html>
<head>
<!-- Twitter Cards (Deleted)-->
<meta charset="utf8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=1, user-scalable=yes">
<!-- デバイスサイズ420px以下のスマホ向け iPhone 6 Plusまで -->
<link rel="stylesheet" type="text/css" media="only screen and (max-device-width:420px)" href="m.css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function chka(){
str=document.jr.atext.value;
strl = str.length;
document.jr.ax1.value=540-strl*18;
document.jr.ax2.value=560-document.jr.atext2.value.length*10;
if (document.jr.right.checked){
 document.jr.bx1.value="10";
document.jr.bx2.value="10";
       }else{
document.jr.bx1.value="65";
document.jr.bx2.value="65";
}
}
$(function(){
    $('.pic').on('contextmenu',function(e){
        alert("画像を保存する際は下の画像を保存ボタンを押してください。");
		return false;
    });
});
</script>
</head>
<body><br>
<?php
$from=["a^","i^","u^","e^","o^","a~","i~","u~","e~","o~","A^","I^","U^","E^","O^","A~","I~","U~","E~","O~"];
$to=["ā","ī","ū","ē","ō","ā","ī","ū","ē","ō","Ā","Ī","Ū","Ē","Ō","Ā","Ī","Ū","Ē","Ō"];
//No Error
ini_set("display_errors", 0);
ini_set("display_startup_errors", 0);
session_start();
//1文字14px
if(isset($_POST["style"])){
if( $_POST['right']=="_right"){
$img1 = './source/'.$_POST['style'].'_right.jpg';
$rgt="checked";
}elseif( $_POST['right']=="_left"){
$img1 = './source/'.$_POST['style'].'_left.jpg';
$lgt="checked";
}else{
$img1 = './source/'.$_POST['style'].'-jrwest.jpg';
$ngt="checked";
}
}else{
echo"Error:スタイルが選択されていません!";exit();
}
if($_POST[style]=="orange" OR $_POST[style]=="yellow" OR $_POST[style]=="green" OR $_POST[style]=='gray-black' OR $_POST[style]=='wakayama'){
$_POST['color']="black";
}else{
unset($_POST[color]);
}
$text = $_POST['text'];
$text2 = $_POST['text2'];
$text3 = $_POST['text3'];
$text3=str_replace($from,$to,$text3);
$btext = $_POST['btext'];
$btext2 = $_POST['btext2'];
$btext2=str_replace($from,$to,$btext2);
$btext3 = $_POST['btext3'];
$atext = $_POST['atext'];
$atext2 = $_POST['atext2'];
$atext2=str_replace($from,$to,$atext2);
$atext3 = $_POST['atext3'];
$font2='./source/'.$_POST['font'];
$font='./source/'.$_POST['font2'];
$f1 = $_POST['f1'];
$f2 = $_POST['f2'];
$f3 = $_POST['f3'];
$x1 = $_POST['x1'];
$x2 = $_POST['x2'];
$x3 = $_POST['x3'];
$y1 = $_POST['y1'];
$y2 = $_POST['y2'];
$y3 = $_POST['y3'];
$bf1 = $_POST['bf1'];
$bf2 = $_POST['bf2'];
$bx1 = $_POST['bx1'];
$bx2 = $_POST['bx2'];
if( $_POST['right']=="_right"){
	$bx1=$bx1-50;
	$bx2=$bx2-50;
}
$by1 = $_POST['by1'];
$by2 = $_POST['by2'];
$af1 = $_POST['af1'];
$af2 = $_POST['af2'];
$ax1 = $_POST['ax1'];
$ax2 = $_POST['ax2'];
$ay1 = $_POST['ay1'];
$ay2 = $_POST['ay2'];
if($_POST['ml']=="true"){
	$fontkr='./source/'."NotoSansCJKkr-Medium.otf";
	$fontcn='./source/'."NotoSansCJKsc-Medium.otf";
	$text4 = $_POST['text4'];
	$f4 = $_POST['f4'];
	$x4 = $_POST['x4'];
	$y4 = $_POST['y4'];
	$text5 = $_POST['text5'];
	$f5 = $_POST['f5'];
	$x5 = $_POST['x5'];
	$y5 = $_POST['y5'];
	$btext3 = $_POST['btext3'];
	$bf3 = $_POST['bf3'];
	$bx3 = $_POST['bx3'];
	$by3 = $_POST['by3'];
	$by3=$by3+1;
	$btext4 = $_POST['btext4'];
	$bf4 = $_POST['bf4'];
	$bx4 = $_POST['bx4'];
	if( $_POST['right']=="_right"){
		$bx3=$bx3-50;
		$bx3base=15;
	}else{
		$bx3base=70;
	}
	$atext3 = $_POST['atext3'];
	$af3 = $_POST['af3'];
	$ax3 = $_POST['ax3'];
	$ay3 = $_POST['ay3'];
	$ay3=$ay3+1;
	$atext4 = $_POST['atext4'];
	$af4 = $_POST['af4'];
	$ax4 = $_POST['ax4'];
	$ay4 = $_POST['ay4'];
	$btext3l=mb_strlen($btext3);
if(empty($bx4)){
	$pbx4="placeholder";
$bx4=$bx3base+$btext3l*15;
}else{
	$pbx4="value";
}
	$by4 = $_POST['by4'];
	$atext3l=mb_strlen($atext3);
	$atext4l=mb_strlen($atext4);
	if(empty($ax4)){
	$pax4="placeholder";
$ax4=545-$atext4l*12;
}else{
	$pax4="value";
}
	if(empty($ax3)){
	$pax3="placeholder";
$ax3=$ax4-20-$atext3l*12;
}else{
	$pax3="value";
}
}

$textl=mb_strlen($text);
if(empty($x1)){
	$px1="placeholder";
$x1=310-$textl*30;
$x1p=200-40*$textl;
if($x1p<70){
	$x1p=70;
}
}else{
	$px1="value";
}
$text2l=mb_strlen($text2);
if(empty($x2)){
	$px2="placeholder";
$x2=310-$text2l*35;
if($_POST['ml']=="true"){
	$x2=$x2-50;
}
if($x2>210){
	$x2=210;
}
}else{
	$px2="value";
}
$atextl=mb_strlen($atext);
if(empty($ax1)){
	$pax1="placeholder";
$ax1=530-$atextl*22;
}else{
	$pax1="value";
}
$atext2l=mb_strlen($atext2);
if(empty($ax2)){
	$pax2="placeholder";
$ax2=545-$atext2l*8;

}else{
	$pax2="value";
}
if( $_POST['right']=="_left"){
	$ax1=$ax1+50;
	$ax2=$ax2+50;
}
if(isset($_POST['ok'])){
$file = 'create.jpg';
$create_image= imagecreatetruecolor(620, 207);
$white = imagecolorallocate($create_image, 0, 0, 0);
imagefill($create_image, 0, 0, $white);
if($_POST["plus"]==true){
$get_image2=imagecreatefromjpeg('./source/'.'whiteback-plus-jrwest.jpg');
}else{
$get_image2=imagecreatefromjpeg('./source/'.'whiteback-jrwest.jpg');
}
$get_image = imagecreatefromjpeg($img1);
$position_x = 0;
$position_y = 0;
$position_x2 = 0;
$position_y2 = 137;
imagecopy($create_image, $get_image2, $position_x, $position_y, 0, 0, 620, 270);
imagecopy($create_image, $get_image, $position_x2, $position_y2, 0, 0, 620, 70);
$color=imagecolorallocate($create_image, 0, 0, 0);
if( isset($_POST['color'])){
$white=imagecolorallocate($create_image, 0, 0, 0);
$sel = 'checked';
}else{
$white=imagecolorallocate($create_image, 255, 255, 255); // 背景
}
$fixedwhite=imagecolorallocate($create_image, 255, 255, 255);
//対象の画像リソース、フォントサイズ、文字列角度、文字のX座標、文字のY座標、色ID、フォントファイル、文字列　の順に指定します
	$bupx1=$x1;
	$x1=$x1-$x1p;
	$textar= preg_split("//u", $text, -1, PREG_SPLIT_NO_EMPTY);
for($i = 0; $i < mb_strlen($text); $i++) {
	$x1=$x1+$x1p;
  imagettftext($create_image, $f1, 0, $x1, $y1, $color, $font2, $textar[$i]);
}
$x1=$bupx1;
$bupx2=$x2;
	$text2ar= preg_split("//u", $text2, -1, PREG_SPLIT_NO_EMPTY);
for($i = 0; $i < mb_strlen($text2); $i++) {
	$x2=$x2+33;
  imagettftext($create_image, $f2, 0, $x2, $y2, $color, $font2, $text2ar[$i]);
}
$realx2=$x2;
$x2=$bupx2;
if($_POST['ml']=="true"){
$bupx4=$x4;
$x4=$realx2+33*mb_strlen($text2);
	$text4ar= preg_split("//u", $text4, -1, PREG_SPLIT_NO_EMPTY);
for($i = 0; $i < mb_strlen($text4); $i++) {
	$x4=$x4+33;
  imagettftext($create_image, $f4, 0, $x4, $y4, $color, $fontkr, $text4ar[$i]);
}
}
$x4=$bupx4;
$bupax1=$ax1;
	$atextar= preg_split("//u", $atext, -1, PREG_SPLIT_NO_EMPTY);
for($i = 0; $i < mb_strlen($atext); $i++) {
	$ax1=$ax1+22;
  imagettftext($create_image, $af1, 0, $ax1, $ay1, $white, $font2, $atextar[$i]);
}
$ax1=$bupax1;
imagettftext($create_image, $af2, 0, $ax2, $ay2, $white, $font2, $atext2);
imagettftext($create_image, $af3, 0, $ax3, $ay3, $white, $fontkr, $atext3);
echo $ay4;
imagettftext($create_image, $af4, 0, $ax4, $ay4, $white, $fontcn, $atext4);
if($_POST["plus"]==true){
$plus="checked";
$fx=20;
$xx=565;
$yx=51;
$textp=$_POST["textp"];
imagettftext($create_image, $fx, 0, $xx, $yx, $fixedwhite, $font2, $textp);
}
imagettftext($create_image, $f3, 0, $x3, $y3, $color, $font, $text3);
$bupbx1=$bx1;
	$btextar= preg_split("//u", $btext, -1, PREG_SPLIT_NO_EMPTY);
	$bx1=$bx1-22;
for($i = 0; $i < mb_strlen($btext); $i++) {
	$bx1=$bx1+22;
  imagettftext($create_image, $bf1, 0, $bx1, $by1, $white, $font2, $btextar[$i]);
}
$bx1=$bupbx1;
imagettftext($create_image, $bf2, 0, $bx2, $by2, $white, $font, $btext2);
if($_POST['ml']=="true"){
	imagettftext($create_image, $bf3, 0, $bx3, $by3, $white, $fontkr, $btext3);
	imagettftext($create_image, $bf4, 0, $bx4, $by4, $white, $fontcn, $btext4);
}
ob_start();
imagejpeg($create_image, null, 90);
$fileb = base64_encode(ob_get_contents());
ob_end_clean();
imagedestroy($create_image);
$_SESSION["base"]=$fileb;
echo '<img src="data:image/jpg;base64,'.$fileb.'" class="pic"><br>';
echo'<a href="save.php">画像を保存</a>  <a href="tweet.php">画像をツイート</a>';
//orange,yellow,green,gray-black
echo'<br>この場で保存しないとデータは破棄される恐れがあります｡また､右クリックから保存された画像は正常に読み込めません｡下のリンクから保存してください｡<hr>
気に入りましたか?<br>
<!--SNS Info (Deleted)--><hr>
<hr>作り直し<br>
<form action="" method="post" name="jr">
スタイル
<select id="language" name="style">
<option value="'.$_POST['style'].'">同じスタイルを適用</option>
<option value="">選択してください</option>
<option value="blue">JR神戸・京都・琵琶湖線風</option>
<option value="red">大阪環状線風</option>
<option value="orange">阪和線風</option>
<option value="yellow">JR宝塚線(福知山線)風</option>
<option value="green">学研都市線(片町線)風</option>
<option value="y-green">大和路線風</option>
<option value="sagano">嵯峨野線(山陰本線)風</option>
<option value="nara">JR奈良線風</option>
<option value="pink">JR東西線風</option>
<option value="orange2">姫新線風</option>
<option value="wakayama">和歌山線風</option>
<option value="aqua">アクアカラー(創作)</option>
<option value="black">黒(創作)</option>
<option value="gray-black">灰地に黒(創作)</option>
<option value="gray-white">灰地に白(創作)</option>
</select><br><br>
<img src="./source/blue-jrwest.jpg" width="360"><br>
↑上に書かれる文字[次の駅/前の駅]の色を選択<br>
阪和線/JR宝塚線/学研都市線/灰地に黒(創作)の場合は黒文字になります。<br>
<br>矢印を消すことができます｡ <br><input type="radio" name="right" value="none" id="none" '.$ngt.'><label for="none">通常</label>
<input type="radio" name="right" value="_right" '.$rgt.'>左矢印を消す<input type="radio" name="right" value="_left" '.$lgt.'>右矢印を消す
<hr><br>
駅名<input type="text" name="text" class="text" value="'.$text.'"><br><br>
<br>
よみ<input type="text" name="text2" class="text"  value="'.$text2.'"><br>
英語<input type="text" class="text" name="text3" value="'.$text3.'"><br>キーボードショートカット(全て半角で入力してください)<br>
<div style="display: inline-block;"><div style="float:left; margin-right:30px;">
a^ / a~ → ā <br>
e^ / e~ → ē <br>
i^ / i~ → ī <br>
o^ / o~ → ō <br>
u^ / u~ → ū <br>
</div><div style="float:left">
A^ / A~ Ā → Ā <br>
E^ / E~ → Ē <br>
I^ / I~ → Ī <br>
O^ / O~ → Ō <br>
U^ / U~ → Ū <br>
</div></div><br>
韓国語<input type="text" class="text ml"  name="text4"  value="'.$text4.'"><br>
<br><br>
少しずれてる時の設定[フォントサイズ/左上起点のX座標/左上起点のY座標]<br>
(灰色字は自動計算された値です。黒字は固定値です。灰色字の欄を埋めた場合固定値となります。)
駅名<input type="tel" name="f1" value="'.$f1.'">
<input type="tel" name="x1" '.$px1.'="'.$x1.'">
<input type="tel" name="y1" value="'.$y1.'"><br>
よみ<input type="tel" name="f2" value="'.$f2.'">
<input type="tel" name="x2" '.$px2.'="'.$x2.'">
<input type="tel" name="y2" value="'.$y2.'"><br>
英語<input type="tel" name="f3" value="'.$f3.'">
<input type="tel" name="x3" value="'.$x3.'">
<input type="tel" name="y3" value="'.$y3.'"><br>
<input type="tel" name="f4" value="'.$f4.'" disabled class="ml">
<input type="tel" name="x4" value="'.$x4.'" placeholder="自動設定(変更不可)" readonly disabled class="ml">
<input type="tel" name="y4" value="'.$y4.'" disabled class="ml"><br>
<hr>
前の駅<br>
よみ<input type="text" name="btext" class="text" value="'.$btext.'"><br>
英語<input type="text" class="text" name="btext2" value="'.$btext2.'"><br>
<br>
韓国語<input type="text" class="text ml"  name="btext3" value="'.$btext3.'"><br>
中国語<input type="text" class="text ml"  name="btext4" value="'.$btext4.'"><br>
<br>
少しずれてる時の設定[フォントサイズ/左上起点のX座標/左上起点のY座標]<br>
よみ<input type="tel" name="bf1" value="'.$bf1.'">
<input type="tel" name="bx1" value="'.$bx1.'">
<input type="tel" name="by1" value="'.$by1.'"><br>
英語<input type="tel" name="bf2" value="'.$bf2.'">
<input type="tel" name="bx2" value="'.$bx2.'">
<input type="tel" name="by2" value="'.$by2.'"><br>
韓国語<input type="tel" name="bf3" value="'.$bf3.'">
<input type="tel" name="bx3" value="'.$bx3.'">
<input type="tel" name="by3" value="'.$by3.'"><br>
中国語<input type="tel" name="bf4" value="'.$bf4.'">
<input type="tel" name="bx4" '.$pbx4.'="'.$bx4.'">
<input type="tel" name="by4" value="'.$by4.'"><br>
<hr>
次の駅<br>
よみ<input type="text" class="text" name="atext" value="'.$atext.'"><br>
英語<input type="text" class="text" name="atext2" value="'.$atext2.'"><br><br>
韓国語<input type="text" class="text ml"  name="btext3" value="'.$atext3.'"><br>
中国語<input type="text" class="text ml"  name="btext4" value="'.$atext4.'"><br>
<br>
少しずれてる時の設定[フォントサイズ/左上起点のX座標/左上起点のY座標]<br>
よみ<input type="tel" name="af1" value="'.$af1.'">
<input type="tel" name="ax1" '.$pax1.'="'.$ax1.'">
<input type="tel" name="ay1" value="'.$ay1.'"><br>
英語<input type="tel" name="af2" value="'.$af2.'">
<input type="tel" name="ax2" '.$pax2.'="'.$ax2.'">
<input type="tel" name="ay2" value="'.$ay2.'"><br>
韓国語<input type="tel" name="af3" value="'.$af3.'">
<input type="tel" name="ax3" '.$pax3.'="'.$ax3.'">
<input type="tel" name="ay3" value="'.$ay3.'"><br>
中国語<input type="tel" name="af4" value="'.$af4.'">
<input type="tel" name="ax4" '.$pax4.'="'.$ax4.'">
<input type="tel" name="ay4" value="'.$ay4.'"><br>

<hr>
その他いろいろ設定<br>
英数字フォント<br>
<select name="font">
<option value="'.$_POST['font2'].'">前回と同じフォント</option>
<option value="GSGPM.ttf">デフォルト</option>
<option value="mplus-2p-medium.ttf">日本語と同じ</option>
</select><br>日本語フォント<br><select name="font2">
<option value="'.$_POST['font'].'">前回と同じフォント</option>
<option value="mplus-2p-medium.ttf">デフォルト</option>
<option value="GSGPM.ttf">英数字と同じ</option>
</select><hr>
<input type="checkbox" name="ok" value="ok" style="!important;" checked="checked">利用規約に同意<br>
<input type="checkbox" name="plus" value="true" '.$plus.'>(β)特定都区市内表示<br>
都市名1文字:<input type="text" name="textp" class="text" value="'.$textp.'"><br>
<input type="submit" class="btn">
</form>';
}else{echo'利用規約に同意してください｡<a href="/">戻る</a>';}
?>