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
        echo "データベースへ接続しました。";
    } catch (Exception $e) {
        $e->getMessage();
        exit();
    }
}
