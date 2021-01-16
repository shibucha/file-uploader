<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画像アップロード</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>画像アップロード掲示板</h1>
    <div class="form">
        <form action="./upload.php" enctype="multipart/form-data" method="POST">
            <div class="image">
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576">
                <input type="file" name="image">
            </div>
            <div class="description">
                <textarea placeholder="キャプション（140文字以下）" name="caption" id="" cols="30" rows="10"></textarea>
            </div>
            <button type="submit">アップロードする</button>
        </form>
    </div>
</body>

</html>