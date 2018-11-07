#!/bin/bash
# -*- coding:utf-8 -*-
# 公開ディレクトリ
public_dir="/home/k000000/WWW/public/"

# public_dirでlsした結果をarr配列の中に代入
# バッククォーテーションで実行
# "配列名=()"で配列を初期化
arr=(`ls $public_dir`)

echo "Content-type: text/html; charset=UTF-8"
echo ""
# タイトル
echo "<title>Share</title>"

echo "<h3>共有ファイル</h3>"

# ディレクトリ内にファイルが無い場合 "none"を表示
# "${#配列名[@]}" で配列の要素数を返す
if [ ${#arr[@]} = 0 ]; then
  echo "none"
fi

# arrからファイル一覧を生成
for item in ${arr[@]};do
  echo "<li style='list-style:none;'>"
  echo "<a href='./public/$item' download='$item'>$item</a>"
  echo "</li>"
done

# アップローダー
echo "<form action='./upload.php' method='post' enctype='multipart/form-data'>"
echo "<h3>アップロード<h3>"
echo "  <div id='drag-drop-area'>"
echo "    <div class='drag-drop-inside'>"
echo "      <p class='drag-drop-info' style='background-color: skyblue; width: 500px; height: 500px;'>ここにファイルをドロップ</p>"
echo "      <p>または</p>"
echo "      <p class='drag-drop-buttons'><input id='fileInput' type='file' name='upfile[]' multiple></p>"
echo "      <input type='submit' value='送信'>"
echo "    </div>"
echo "  </div>"
echo "</form>"

# 以下scriptタグと上記formタグ内のdivタグはドラッグアンドドロップ用の実装
echo "<script>"
echo "var fileArea = document.getElementById('drag-drop-area');"
echo "var fileInput = document.getElementById('fileInput');"
echo ""
echo ""
echo "fileArea.addEventListener('dragover', function(evt){"
echo "  evt.preventDefault();"
echo "  fileArea.classList.add('dragover');"
echo "});"
echo ""
echo "fileArea.addEventListener('dragleave', function(evt){"
echo "    evt.preventDefault();"
echo "    fileArea.classList.remove('dragover');"
echo "});"
echo "fileArea.addEventListener('drop', function(evt){"
echo "    evt.preventDefault();"
echo "    fileArea.classList.remove('dragenter');"
echo "    var files = evt.dataTransfer.files;"
echo "    fileInput.files = files;"
echo "});"
echo "</script>"

# デバッグ及びセキュリティ用アクセスログ
echo "<script src='./log.php'><script>"
