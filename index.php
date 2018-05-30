<?php
//Analytics Code(Deleted)
?>
<!doctype html>
<head>

<!-- Twitter Cards (Deleted) -->
<meta charset="utf8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=1, user-scalable=yes">
<!-- デバイスサイズ420px以下のスマホ向け iPhone 6 Plusまで -->
<link rel="stylesheet" type="text/css" media="only screen and (max-device-width:420px)" href="m.css"/>
<link rel="stylesheet" type="text/css" href="master.css"/>
<script>
function chka(){
str=document.jr.atext.value;
strl = str.length;
document.jr.ax1.value=565-strl*28;
if (document.jr.right.checked){
 document.jr.bx1.value="10";
document.jr.bx2.value="10";
       }else{
document.jr.bx1.value="65";
document.jr.bx2.value="65";
}
}

</script>

<title>JR 西日本風駅名標作成-Generate Cutls</title>
</head>
<body>
	<script>
 //Analytics Code (Deleted)

</script>
<div id="content">
<?php
//Mail Code(Deleted)
?>
<div id="fb-root"></div>
<script>//Facebook Code(Deleted)
</script>
<br>
<!--Service Ending Infomation Space(Deleted)-->
<img src="top.jpg" class="pic"><br>
Update on 2017.12.25<br>
長音記号の入力が簡単になりました<br>
<span style="display:inline-block; width:1em; line-height:1em; vertical-align:center; text-align:center; background-color: #F79FBA; color: #000; font-weight:bold">T</span>
和歌山線(#f79fba)に対応しました。(色等はWikipedia参照)<br>
スタイルプレビュー機能に対応しました(色と矢印を確認)<br>
右矢印も消せるようになりました。<br>
履歴<br>
駅名漢字から自動でよみがなやローマ字を入力、前後の駅名もローマ字を自動補完。(2017.9)<br>
京都駅などに見られる4ヶ国語表示に対応しました。(日英韓中[簡体字])(2017.9)<br>
SSL通信に対応しました。(2017.5)<br>
オートコンプリートシステムに対応しました。文字間隔も含め全ての文字の配置が自動計算されます。<br>
ドメインを変更しました。従来のページに行こうとするとこちらに自動リダイレクトされます。<br>
<br>私的利用と常識の範囲でお願いします｡こちらも趣味の範囲で作っています｡<br>お問い合わせは<a href="http://cutls.com/report/">こちら</a><br>
これを利用した際のトラブルに関しては一切責任を負えませんのでご注意ください｡<br>
今のところ最大1つの画像しか作れず、2回目以降は上書きされます。画像を直リンクするのではなく、その都度保存することをお勧めします<hr>
<form action="create.php" method="post" name="jr">
スタイル
<select name="style" class="text" onchange="chk3()">
<option value="blue">通常青(JR神戸,京都,琵琶湖線等)</option>
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
<br>矢印を消すことができます｡ <br>
<input type="radio" name="right" value="-jrwest" onchange="chk3()" id="none" checked><label for="none">通常</label>
<input type="radio" name="right" value="_right" onchange="chk3()" id="chk" ><label for="chk">左矢印を消す</label>
<input type="radio" name="right" value="_left" onchange="chk3()" id="chk2" ><label for="chk2">右矢印を消す</label><br>
New!スタイルプレビュー<br>
<img src="./source/blue-jrwest.jpg" class="pic" id="change"><br>
↑上に書かれる文字[次の駅/前の駅]の色を選択<br>
阪和線/JR宝塚線/学研都市線/灰地に黒(創作)の場合は黒文字になります。<br>
<script>
function chk3(){
	var img="./source/"+$("[name=style]").val()+$("[name=right]:checked").val()+".jpg";
	console.log(img);
	$("#change").attr("src",img);
}
</script>
<hr><br>
駅名<input type="text" class="text"  name="text"><br>
漢字からよみがな・ローマ字を補完します。Yahoo! テキスト解析Web APIを使用。
<br><button type="button" onclick="convert()" class="btn">自動補完</button><br><br>
よみ<input type="text" class="text"  name="text2"><br>
英語<input type="text" class="text"  name="text3"><br>
キーボードショートカット(全て半角で入力してください)<br>
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
<br><input type="checkbox" name="ml" value="true" onchange="multi()" id="ml" ><label for="ml">マルチリンガル</label><br>
韓国語<input type="text" class="text ml"  name="text4" disabled><br>
<br>
高度な設定[font size/x/y]最初はこのままで<br>
<input type="tel" name="f1" value="50">
<input type="tel" name="x1" value="" placeholder="自動設定">
<input type="tel" name="y1" value="75"><br>
<input type="tel" name="f2" value="24">
<input type="tel" name="x2" value="" placeholder="自動設定">
<input type="tel" name="y2" value="120"><br>
<input type="tel" name="f3" value="24">
<input type="tel" name="x3" value="340">
<input type="tel" name="y3" value="120"><br>
<input type="tel" name="f4" value="24" disabled class="ml">
<input type="tel" name="x4" value="" placeholder="自動設定(変更不可)" readonly disabled class="ml">
<input type="tel" name="y4" value="120" disabled class="ml"><br>
<hr>
前の駅<br>
よみ<input type="text" class="text"  name="btext"><br>
よみからローマ字を補完します。
<br><button type="button" onclick="convertb()" class="btn">自動補完</button><br><br>
英語<input type="text" class="text"  name="btext2"><br><br>
韓国語<input type="text" class="text ml"  name="btext3" disabled><br>
中国語<input type="text" class="text ml"  name="btext4" disabled><br>

<br>
高度な設定[font size/x/y]最初はこのままで<br>
<input type="tel" name="bf1" value="18">
<input type="tel" name="bx1" value="65">
<input type="tel" name="by1" value="175"><br>
<input type="tel" name="bf2" value="11">
<input type="tel" name="bx2" value="65">
<input type="tel" name="by2" value="195"><br>
<input type="tel" name="bf3" value="11" disabled class="ml">
<input type="tel" name="bx3" value="65" disabled class="ml">
<input type="tel" name="by3" value="202" disabled class="ml"><br>
<input type="tel" name="bf4" value="11" disabled class="ml">
<input type="tel" name="bx4" value="" placeholder="自動設定" disabled class="ml">
<input type="tel" name="by4" value="202" disabled class="ml"><br>
<hr>
次の駅<br>
よみ<input type="text" class="text"  name="atext"><br>
よみからローマ字を補完します。
<br><button type="button" onclick="converta()" class="btn">自動補完</button><br><br>
英語<input class="text" type="text" name="atext2"><br><br>
韓国語<input type="text" class="text ml"  name="atext3" disabled><br>
中国語<input type="text" class="text ml"  name="atext4" disabled><br>
高度な設定[font size/x/y]最初はこのままで<br>
<input type="tel" name="af1" value="18">
<input type="tel" name="ax1" placeholder="自動設定">
<input type="tel" name="ay1" value="175"><br>
<input type="tel" name="af2" value="11">
<input type="tel" name="ax2" placeholder="自動設定">
<input type="tel" name="ay2" value="195"><br>
<input type="tel" name="af3"  value="11" disabled class="ml">
<input type="tel" name="ax3" value="" placeholder="自動設定" disabled class="ml">
<input type="tel" name="ay3" value="202" disabled class="ml"><br>
<input type="tel" name="af4" value="11" disabled class="ml">
<input type="tel" name="ax4" value="" placeholder="自動設定" disabled class="ml">
<input type="tel" name="ay4" value="202" disabled class="ml"><br>
<hr>
その他いろいろ設定<br>
<input type="checkbox" id="lcm" name="plus" value="true" '.$plus.'><label for="lcm">特定都区市内表示</label><br>
都市名1文字:<input type="text" name="textp" class="text" value=""><br>
日本語フォント
<select name="font">
<option value="mplus-2p-medium.ttf">デフォルト</option>
<option value="GSGPM.ttf">英数字と同じ</option></select><br>
英数字フォント
<select name="font2">
<option value="GSGPM.ttf">デフォルト</option>
<option value="mplus-2p-medium.ttf">日本語と同じ</option>
</select><br>
なお、韓国語は"Noto Sans CJK KR"を、中国語簡体字は"Noto Sans CJK SC"を利用しています。<br>
<hr>
利用規約<br>
私的利用と常識の範囲内の利用をお願いします｡こちらも趣味の範囲で作っています｡<br>お問い合わせは<a href="http://cutls.com/report/">こちら</a><br>
これを利用した際のトラブルに関しては一切責任を負えませんのでご注意ください｡<br>
Base64フォーマットで表示しています､URLは表示されませんので保存しなければ破棄されます｡<hr>
<input type="checkbox" name="ok" value="ok" style="!important;" id="pa">
<label for="pa">利用規約に同意</label><br><br>
<input class="btn" type="submit" value="Generate!">
</form><hr>
<!-- Mailing System (Deleted)-->
<hr>
<!--SNS Infomation(Deleted)-->
<hr>
<!--Cutls Service Infomation(Deleted)-->
&copy;2015 Cutls.com All Rights Reserved.
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

function multi(){
	if($("#ml").hasClass("m-true")){
		$("#ml").removeClass("m-true");
		$(".ml").prop("disabled",true);
		$("[name=x3]").val("340");
		$("[name=by1]").val("175");
		$("[name=by2]").val("195");
		$("[name=ay1]").val("175");
		$("[name=ay2]").val("195");
	}else{
		$("#ml").addClass("m-true");
		$(".ml").prop("disabled",false);
		$("[name=x3]").val("300");
		$("[name=by1]").val("175");
		$("[name=by2]").val("188");
		$("[name=ay1]").val("175");
		$("[name=ay2]").val("188");
	}
   }
function convert(){
	var q=$("[name=text]").val();
	$.ajax({
  type: 'GET',
  url: 'auto.php?q='+q,
  dataType: 'json',
  success: function(json){
    $("[name=text2]").val(json["hiragana"]);
	$("[name=text3]").val(json["roman"]);
  }
});
}
function convertb(){
	console.log("re");
	var q=$("[name=btext]").val();
	$.ajax({
  type: 'GET',
  url: 'auto.php?h=none&q='+q,
  dataType: 'json',
  success: function(json){
    $("[name=btext2]").val(json["roman"]);
  }
});
}
function converta(){
	var q=$("[name=atext]").val();
	$.ajax({
  type: 'GET',
  url: 'auto.php?h=none&q='+q,
  dataType: 'json',
  success: function(json){
    $("[name=atext2]").val(json["roman"]);
  }
});
}
</script>
</body>
</html>