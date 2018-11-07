<?php
// name属性に"upfile[]"と指定されたタグから、1つずつファイルを取得する
for ($i = 0; $i< count($_FILES["upfile"]["tmp_name"]); $i++) {
	// ファイルが存在するかを確認するバリデーション
	if (is_uploaded_file($_FILES["upfile"]["tmp_name"][$i])) {
		// ファイル名にタイムスタンプを付与して重複をなくす(cgiの都合上ファイル名からスペースを削除する)
		$fileName = "./public/".date("[Y-m-d_His]") . preg_replace("/( |　)/", "", $_FILES["upfile"]["name"][$i]);

		// Todo: 拡張子によるバリデーション(未実装)

		// ファイルの重複を確認
		if (file_exists($fileName)===false) {
			// アップロードされたファイルを$fileNameディレクトリ内に保存
			if (move_uploaded_file($_FILES["upfile"]["tmp_name"][$i], $fileName)) {
				// 成功
				chmod($fileName, 0644);
				echo "<p>" . $_FILES["upfile"]["name"][$i] . "をアップロードしました。</p>";
			} else {
				// 失敗
				echo "アップロードエラー";
			}
		} else {
			// 重複
			echo "既にファイルが存在します。少し時間をおいてやり直してください。";
		}
	} else {
		// ファイル未選択
	  echo "ファイルが選択されていません";
	}
}
// 戻るボタン
echo "<a href='http://web.edu.kutc.kansai-u.ac.jp/~k000000/'>戻る</a>";
?>
