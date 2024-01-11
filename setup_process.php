<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h1 class="text-5xl text-center">tCloud NEXT</h1>
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Setup</h2>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.tailwindcss.com"></script>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <?php

            error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
            require_once __DIR__ . '/functions.php';
            require_unlogined_session();

            require_once __DIR__ . '/db.php';

            require_once __DIR__ . '/sub.php';

            // データベースに接続
            $conn = new mysqli(servername(), username(), password(), dbname());

            // 接続確認
            if ($conn->connect_error) {
                die("エラー・接続: " . $conn->connect_error);
            }

            // テーブル名
            $tableName = "user";

            // 行が1つ以上あるかどうかのクエリ
            $sql = "SELECT COUNT(*) as count FROM $tableName";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $rowCount = $row["count"];

                if ($rowCount > 0) {
                    echo "It's already set up.";
                } else {
                    $conn = new mysqli(servername(), username(), password(), dbname());

                    if ($conn->connect_error) {
                        die("Error: " . $conn->connect_error);
                    }

                    $cnvtstr = str_replace("　","", $_POST['id'] );
                    $newid = str_replace(" ","", $cnvtstr );
                    $newpassword = password_hash( $_POST['password'] , PASSWORD_BCRYPT);

                    if ($newid == ""){

                        $conn->close();
                        die("Error: There is no entry in the username field.");
        
                    }

                    $newpassword = password_hash( $_POST['password'] , PASSWORD_BCRYPT);
                    
                    // クエリの実行
                    $conn->query("INSERT INTO User (username, password, isowner) VALUES ('$newid', '$newpassword', 1)");

                    echo "Added account. You can log in with login.php.";
                }

            } else {

                echo "Error";
                
            }

            // データベース接続を閉じる
            $conn->close();


            header('Content-Type: text/html; charset=UTF-8');


        ?>
    </div>
</div>