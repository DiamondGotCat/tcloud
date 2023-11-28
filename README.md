
こんにちは。tCloud for Businessを発見していただきありがとうございます。

tCloudは、PHPで作られた、オープンソースの安全なファイル管理システムです。

同梱されているMITライセンスに従って使用してください。

また、ソースコードはsource.zipに圧縮してありますので、
解凍してお使いください。

よろしくお願いします。

テスト環境:
macOS 14 & 
Apache/2.4.58 (Unix) & 
PHP 8.2.12 (cli)


このソフトウェアはTailwind CSSを用いて制作されました。
Tailwind CSSのライセンスは、Tailwind CSSフォルダの下にあります。

使用する前に、以下の変更を行う必要があります。
- ソースコード内のtCloudフォルダ内のusers.jsonのadminのpasswordを、コマンドで生成し、置き換えます。
  -  php -r 'echo password_hash("ここに管理者に割り当てたいパスワードを入力", PASSWORD_BCRYPT), PHP_EOL;' 
