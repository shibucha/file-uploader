<?php
session_start();

// POSTで受け取ったデータ関連
$file = $_FILES['image'];
$filename = $file['name'];
$tmp_path = $file['tmp_name'];
$file_err = $file['error'];
$filesize = $file['size'];
$caption = filter_input(INPUT_POST, 'caption', FILTER_SANITIZE_SPECIAL_CHARS);

// 画像の拡張子関連
$allow_ext = ['jpg', 'jpeg', 'png'];
$file_ext = pathinfo($filename, PATHINFO_EXTENSION);

// ********バリデーション************//
$_SESSION['err'] = [];

// キャプション
if (strlen($caption) > 140) {
    $_SESSION['err'] = "140文字以下で入力してください。";
}

// 画像
if ($filesize > 1048576 || $file_err === 2) {
    $_SESSION['err'] = "ファイルサイズは１MB以下にしてください。";
}

if(!in_array($file_ext,$allow_ext)){
    $_SESSION['err']="画像ファイルをアップロードしてください。";
}

if(!is_uploaded_file($tmp_path)){
    $_SESSION['err']="ファイルが選択されません。";
} else {
    $_SESSION['upload']="画像がアップロードされました。";
}

// var_dump($_SESSION['err']);
header('Location: /index.php');
exit();
