<?php
require("vendor/autoload.php");

use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;

if (empty($_SERVER['PATH_INFO'])) {
    //紹介ページを表示
    include('./views/index.php');
    exit;
}
//スラッシュで区切られたurlを取得します
$analysis = explode('/', $_SERVER['PATH_INFO']);
$call;
foreach ($analysis as $value) {
    if ($value !== "") {
        $call = $value;
        break;
    }
}
//modelをインクルードします
if (file_exists('./Models/'.$call.'.php')) {
    include('./Models/'.$call.'.php');
    //callを使用してインスタンス化するクラス名を作成し、使用する
    $className = "Models\\".$call;
    $class = new $className();
    $ret = $class->index($analysis);
    //配列キーが設定されている配列なら展開します
    if (!is_null($ret)) {
        if (is_array($ret)) {
            extract($ret);
        }
    }
}
//viewをインクルードします
if (file_exists('./Views/'.$call.'.php')) {
    include('./Views/'.$call.'.php');
} else {
    include('./Views/Error.php');
}

// ロガー作成
$logger = new Logger('sample');
$logger->pushHandler(new StreamHandler('logs/sample.log', Logger::INFO));

try {
  // INFOログ出力
  $logger->info('情報ログ');

  // 例外発生
  throw new RuntimeException('ランタイム例外が発生しました。');

} catch (RuntimeException $e) {
  // ERRORログ出力
  $logger->error($e->getMessage());
}