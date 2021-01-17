<?php
//オートローダーのライブラリ読み込み
require_once(__DIR__ . '/vendor/autoload.php');

// クラスの読み込み
use Dotenv\Dotenv;

// .envから環境変数を読み込むための処理
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


function dbc()
{
    try {
        $dbh = new PDO(
            $_ENV['DB_DSN'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASS'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );

       return $dbh;

    } catch (Exception $e) {
        $e->getMessage();
        exit();
    }
}

function fileSave($unique_filename, $save_path, $caption, $dbh){

    try {
        $sql="insert into images(file_name, file_path, caption) value(:filename, :file_path, :caption)";
        $prepare = $dbh->prepare($sql);

        $prepare->bindValue(':filename', $unique_filename);
        $prepare->bindValue(':file_path', $save_path);
        $prepare->bindValue(':caption', $caption);

        $prepare->execute();

    } catch (Exception $e) {
        exit($e->getMessage());
    }

}