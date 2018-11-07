# 注意
index.cgiの4行目を任意のパスに変更すること!
upload.phpの32行目を任意のURLに変更すること

# 環境設定
## ログ記録用ファイルを生成
touch ./log.txt
## パーミッション一覧
chmod 705 ./index.cgi
chmod 755 ./log.php
chmod 702 ./log.txt
chmod 777 ./public
chmod 705 ./upload.php
