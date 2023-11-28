# tCloud
Open source secure file storage system

## English
Hello. Thank you for discovering tCloud for Business.

tCloud is an open source secure file management system written in PHP.

Please use it according to the included MIT license.

The release ZIP file contains the following contents:
source.zip (1)
README.md (1)
license.txt (2)

Please treat me well.

Test environment: macOS 14 & Apache/2.4.58 (Unix) & PHP 8.2.12 (cli)

This software was created using Tailwind CSS. The Tailwind CSS license is located under the Tailwind CSS folder.

Before use, you must make the following changes:

- Generate and replace the admin password in users.json in the tCloud folder in the source code using the command.
  - php -r 'echo password_hash("Enter the password you want to assign to the administrator here", PASSWORD_BCRYPT), PHP_EOL;' 
- Replace line 8 of /tCloud/login.php with the path to the users.json file.

Example of the 8th line of users.json:
```php
<?php

$json = file_get_contents('http://example.com/tCloud/users.json'); # Example

?>
```

## 日本語
こんにちは。tCloud for Businessを発見していただきありがとうございます。

tCloudは、PHPで作られた、オープンソースの安全なファイルストレージシステムです。

同梱されているMITライセンスに従って使用してください。

リリースのZIPファイル内には以下の内容物があります。
source.zip (1つ)
README.md (1つ)
license.txt (2つ)

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
- /tCloud/login.phpの8行目をusers.jsonファイルへのパスに置き換えます。

users.jsonの8行目の例:
```php
<?php

$json = file_get_contents('http://example.com/tCloud/users.json'); # Example

?>
```
