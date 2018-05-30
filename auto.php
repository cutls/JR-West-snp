<?php
$str=$_GET[q];
if($_GET[h]!="none"){
$xml=simplexml_load_file("https://jlp.yahooapis.jp/FuriganaService/V1/furigana?appid=dj00aiZpPWZMbUs1eTBwb3FITiZzPWNvbnN1bWVyc2VjcmV0Jng9YWQ-&grade=1&sentence=".$str);
$xml=$xml->Result;
$xml=$xml->WordList;
$xml=$xml->Word;
//print_r($xml);
for($i=0;$i<count($xml);$i++){
	$word=$xml[$i];
	$furigana=$word->Furigana;
	$roman=$word->Roman;
	if(empty($furigana)){
		$furigana=$word->Surface;
		$roman=$word->Surface;
	}
	$string=$string.$furigana;
	$romanstr=$romanstr.$roman;
}
}else{
	$string=$str;
}
$kana2romaji = new Kana2Romaji;
$result = $kana2romaji->convert($string);
$result=ucwords($result);
$from=["aa","ii","uu","ee","oo","ou"];
$to=["ā","ī","ū","ē","ō","ō"];
$result=str_replace($from,$to,$result);
$from=["Aa","Ii","Uu","Ee","Oo","Ou"];
$to=["Ā","Ī","Ū","Ē","Ō","Ō"];
$result=str_replace($from,$to,$result);
 echo json_encode(["hiragana"=>$string,"roman"=>$result]);
class Kana2Romaji{
    function convert($str)
    {
        $str = mb_convert_kana($str, 'cHV', 'utf-8');
 
        $kana = array(
            'きゃ', 'きぃ', 'きゅ', 'きぇ', 'きょ',
            'ぎゃ', 'ぎぃ', 'ぎゅ', 'ぎぇ', 'ぎょ',
            'くぁ', 'くぃ', 'くぅ', 'くぇ', 'くぉ',
            'ぐぁ', 'ぐぃ', 'ぐぅ', 'ぐぇ', 'ぐぉ',
            'しゃ', 'しぃ', 'しゅ', 'しぇ', 'しょ',
            'じゃ', 'じぃ', 'じゅ', 'じぇ', 'じょ',
            'ちゃ', 'ちぃ', 'ちゅ', 'ちぇ', 'ちょ',
            'ぢゃ', 'ぢぃ', 'ぢゅ', 'ぢぇ', 'ぢょ',
            'つぁ', 'つぃ', 'つぇ', 'つぉ',
            'てゃ', 'てぃ', 'てゅ', 'てぇ', 'てょ',
            'でゃ', 'でぃ', 'でぅ', 'でぇ', 'でょ',
            'とぁ', 'とぃ', 'とぅ', 'とぇ', 'とぉ',
            'にゃ', 'にぃ', 'にゅ', 'にぇ', 'にょ',
            'ヴぁ', 'ヴぃ', 'ヴぇ', 'ヴぉ',
            'ひゃ', 'ひぃ', 'ひゅ', 'ひぇ', 'ひょ',
            'ふぁ', 'ふぃ', 'ふぇ', 'ふぉ',
            'ふゃ', 'ふゅ', 'ふょ',
            'びゃ', 'びぃ', 'びゅ', 'びぇ', 'びょ',
            'ヴゃ', 'ヴぃ', 'ヴゅ', 'ヴぇ', 'ヴょ',   
            'ぴゃ', 'ぴぃ', 'ぴゅ', 'ぴぇ', 'ぴょ',
            'みゃ', 'みぃ', 'みゅ', 'みぇ', 'みょ',   
            'りゃ', 'りぃ', 'りゅ', 'りぇ', 'りょ',
            'うぃ', 'うぇ', 'いぇ'
        );
         
        $romaji  = array(
            'kya', 'kyi', 'kyu', 'kye', 'kyo',
            'gya', 'gyi', 'gyu', 'gye', 'gyo',
            'qwa', 'qwi', 'qwu', 'qwe', 'qwo',
            'gwa', 'gwi', 'gwu', 'gwe', 'gwo',
            'sya', 'syi', 'syu', 'sye', 'syo',
            'ja', 'jyi', 'ju', 'je', 'jo',
            'cha', 'cyi', 'chu', 'che', 'cho',
            'dya', 'dyi', 'dyu', 'dye', 'dyo',
            'tsa', 'tsi', 'tse', 'tso',
            'tha', 'ti', 'thu', 'the', 'tho',
            'dha', 'di', 'dhu', 'dhe', 'dho',
            'twa', 'twi', 'twu', 'twe', 'two',
            'nya', 'nyi', 'nyu', 'nye', 'nyo',
            'va', 'vi', 've', 'vo',
            'hya', 'hyi', 'hyu', 'hye', 'hyo',
            'fa', 'fi', 'fe', 'fo',
            'fya', 'fyu', 'fyo',
            'bya', 'byi', 'byu', 'bye', 'byo',
            'vya', 'vyi', 'vyu', 'vye', 'vyo',
            'pya', 'pyi', 'pyu', 'pye', 'pyo',
            'mya', 'myi', 'myu', 'mye', 'myo',
            'rya', 'ryi', 'ryu', 'rye', 'ryo',
            'wi', 'we', 'ye'
        );
         
        $str = $this->kana_replace($str, $kana, $romaji);
 
        $kana = array(
            'あ', 'い', 'う', 'え', 'お',
            'か', 'き', 'く', 'け', 'こ',
            'さ', 'し', 'す', 'せ', 'そ',
            'た', 'ち', 'つ', 'て', 'と',
            'な', 'に', 'ぬ', 'ね', 'の',
            'は', 'ひ', 'ふ', 'へ', 'ほ',
            'ま', 'み', 'む', 'め', 'も',
            'や', 'ゆ', 'よ',
            'ら', 'り', 'る', 'れ', 'ろ',
            'わ', 'ゐ', 'ゑ', 'を', 'ん',
            'が', 'ぎ', 'ぐ', 'げ', 'ご',
            'ざ', 'じ', 'ず', 'ぜ', 'ぞ',
            'だ', 'ぢ', 'づ', 'で', 'ど',
            'ば', 'び', 'ぶ', 'べ', 'ぼ',
            'ぱ', 'ぴ', 'ぷ', 'ぺ', 'ぽ'
        );
         
        $romaji = array(
            'a', 'i', 'u', 'e', 'o',
            'ka', 'ki', 'ku', 'ke', 'ko',
            'sa', 'shi', 'su', 'se', 'so',
            'ta', 'chi', 'tsu', 'te', 'to',
            'na', 'ni', 'nu', 'ne', 'no',
            'ha', 'hi', 'fu', 'he', 'ho',
            'ma', 'mi', 'mu', 'me', 'mo',
            'ya', 'yu', 'yo',
            'ra', 'ri', 'ru', 're', 'ro',
            'wa', 'wyi', 'wye', 'wo', 'n',
            'ga', 'gi', 'gu', 'ge', 'go',
            'za', 'ji', 'zu', 'ze', 'zo',
            'da', 'ji', 'zu', 'de', 'do',
            'ba', 'bi', 'bu', 'be', 'bo',
            'pa', 'pi', 'pu', 'pe', 'po'
        );
         
        $str = $this->kana_replace($str, $kana, $romaji);
         
        $str = preg_replace('/(っ$|っ[^a-z])/u', "xtu", $str);
        $res = preg_match_all('/(っ)(.)/u', $str, $matches);
        if(!empty($res)){
            for($i=0;isset($matches[0][$i]);$i++){
                if($matches[0][$i] == 'っc') $matches[2][$i] = 't';
                $str = preg_replace('/' . $matches[1][$i] . '/u', $matches[2][$i], $str, 1);
            }
        }
         
        $kana = array(
            'ぁ', 'ぃ', 'ぅ', 'ぇ', 'ぉ',
            'ヵ', 'ヶ', 'っ', 'ゃ', 'ゅ', 'ょ', 'ゎ', '、', '。', '　'
        );
         
        $romaji = array(
            'a', 'i', 'u', 'e', 'o',
            'ka', 'ke', 'xtu', 'xya', 'xyu', 'xyo', 'xwa', ', ', '.', ' '
        );
        $str = $this->kana_replace($str, $kana, $romaji);
         
        $str = preg_replace('/^ー|[^a-z]ー/u', '', $str);
        $res = preg_match_all('/(.)(ー)/u', $str, $matches);
 
        if($res){
            for($i=0;isset($matches[0][$i]);$i++){
                if( $matches[1][$i] == "a" ){ $replace = 'â'; }
                else if( $matches[1][$i] == "i" ){ $replace = 'î'; }
                else if( $matches[1][$i] == "u" ){ $replace = 'û'; }
                else if( $matches[1][$i] == "e" ){ $replace = 'ê'; }
                else if( $matches[1][$i] == "o" ){ $replace = 'ô'; }
                else { $replace = ""; }
                 
                $str = preg_replace('/' . $matches[0][$i] . '/u', $replace, $str, 1);
            }
        }
         
        return $str;
    }
 
    function kana_replace($str, $kana, $romaji)
    {
        $patterns = array();
        foreach($kana as $value){
            $patterns[] = '/' . $value . '/';
        }
         
        $str = preg_replace($patterns, $romaji, $str);
        return $str;
    }
}