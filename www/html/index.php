<?php

session_start();

if (isset($_SESSION['err'])) {
    // エラーメッセージが１つのみだった場合配列に変換してforeach内で処理を行うため。
    $_SESSION['err'] = [];
    $errs = [];
    foreach ($_SESSION['err'] as $err) {
        $errs = $err;
        echo $err;
        echo '<br>';
    }
    unset($_SESSION['err']);
}
if (isset($_SESSION['upload'])) {
    $upload_message = $_SESSION['upload'];
    unset($_SESSION['upload']);
    echo $upload_message;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画像アップロード</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container">
        <h1>画像アップロード掲示板</h1>
        <div class="form">
            <form action="./upload.php" enctype="multipart/form-data" method="POST" class="form__input">
                <div class="image">
                    <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                    <input type="file" name="image">
                </div>
                <div class="description">
                    <textarea placeholder="キャプション（140文字以下）" name="caption" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="btn">
                    <button class="form__btn" type="submit">アップロードする</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>