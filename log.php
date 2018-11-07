<?php
//タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

//日付の取得
$time=date("Y/m/d H:i:s");
//ＵＲＬの取得
$requestUrl=$_SERVER['REQUEST_URI'];
//リクエストメソッドの取得
$requestMethod=$_SERVER['REQUEST_METHOD'];
//ブラウザ情報の取得
$requestbrowser=$_SERVER['HTTP_USER_AGENT'];
//IPアドレス(ローカルでの::1は自分を示す)
$requestIp=$_SERVER['REMOTE_ADDR'];
//ホスト名を取得
$hostName=@gethostbyaddr($requestIp);
//遷移元ページを取得
$httpReferer=$_SERVER['HTTP_REFERER'];
$log="日時は".$time.",接続先は".$requestUrl.",リクエストメソッドは".$requestMethod.",ブラウザは".$requestbrowser.",相手のIPは".$requestIp.",HOSTNAMEは".$hostName.",遷移元は".$httpReferer."\n";

// ファイルパス
$file = 'log.txt';

// 書き込み
$fp = fopen($file, "a");
fwrite($fp, $log);
fclose($fp);

?>
