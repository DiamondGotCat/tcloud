<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h1 class="text-5xl text-center">tCloud NEXT</h1>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.tailwindcss.com"></script>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <?php

            error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
            require_once '../functions.php';
            require_once '../db.php';

            // データベースに接続
            $conn = new mysqli(servername(), username(), password(), dbname());

            // 接続確認
            if ($conn->connect_error) {
                die("エラー・接続: " . $conn->connect_error);
            }

            // テーブル名
            $tableName = "user";
            $cnvtstr = str_replace("　","", $_POST['id'] );
            $newid = str_replace(" ","", $cnvtstr );
            $newpassword = password_hash( $_POST['password'] , PASSWORD_BCRYPT);
            
            if ($newid == ""){

                $conn->close();
                die("エラー: ユーザー名フィールドに入力がありません。");

            }

            try {

                // クエリの実行
                $conn->query("INSERT INTO User (username, password) VALUES ('$newid', '$newpassword')");

                echo "アカウントを追加しました。login.phpでログインできます。";

            } catch ( Exception $e ) {

                echo "<h1 class='text-center text-xl font-semibold text-red-600'>エラーが発生しました。</h1>";
                echo "<div class='text-center'>";
                echo "エラーの内容は以下の通りです: <br>";
                echo $e->getMessage();
                echo "<br><br><br>同じ名前の人がいる可能性があります。";
                echo "</div>";

            }

            // データベース接続を閉じる
            $conn->close();

            header("Location: /add_dir.php?dirname=" . $newid);


        ?>

    </div>
</div>