<?php
//オートローダーのライブラリ読み込み
require_once('./vendor/autoload.php');

// クラスの読み込み
use Dotenv\Dotenv;
// use App\Database\PdoConnect;

// .envから環境変数を読み込むための処理
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

phpinfo();