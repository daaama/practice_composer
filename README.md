# ルーターを作ってみる
今回、ルーターってどうやってできてんやろ？って言う疑問を解消するべくバニラphpで作ってみる。  
作ってみるといってもどうやって作成していいかわかんなかったので「php ルーティング 自作」で調べて  
良さそうな記事をほとんど丸パクリしながら実装した感じになる。  

- 今回参考にした記事様

PHPで超簡単自作フレームワーク( https://qiita.com/kahirokunn/items/175b82295ab683ffb624 )

## 動く物を作る
とりあえず、記事の中にあるコードを丸々移植。そこからコードを読み進める。
一通り流れを理解して、実際に表示されるようにファイルを展開していく。
phpサーバーを立てる為に下記のコマンドを実行。これ結構便利だし、あまり使ってこなかったので今後は使っていく。
```
php -S 127.0.0.1:8080
```
ポートが空いていることは先に確認しておく必要あり。
実際にページにアクセスして、トップページが表時されていることアンカーリンクを設置した場合にちゃんとページ遷移することを確認。
該当しないページはエラーページが出ることも確認。いい感じ。

## わからなかったもの・継続してわかっていないもの
- $_SERVER

https://php.net/manual/ja/reserved.variables.server.php
上のURL見てもあんましようわからんところ。  
実際にvar_dumpを仕込んで確認して見ても、いまいちなんのこっちゃなので、これが説明できるまで調べる。  
今の所の個人的な解釈は、ヘッダ情報とかが羅列されて帰ってくるからそこらへんの情報を取得する場合はこれを使うと便利。

- modelのインスタンス化

初期は、クラス名だけでインスタンス化できると思ってたけど違ったみたい。  
てか、書いてて気づいたけどそもそもファイルの記述場所が違うからインスタンス化できんやんけ。