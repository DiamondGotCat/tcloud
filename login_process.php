<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h1 class="text-5xl text-center">tCloud NEXT</h1>
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.tailwindcss.com"></script>
    </div>
  
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

        <?php

            error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);

            require_once __DIR__ . '/functions.php';
            require_unlogined_session();


            function get_password($user) {

                require_once __DIR__ . '/db.php';

                // ユーザから受け取ったユーザ名とパスワード

                // mysqliクラスのインスタンスを作成してデータベースに接続
                $mysqli = new mysqli(servername(), username(), password(), dbname());

                // 接続エラーの確認
                if ($mysqli->connect_error) {
                    die("Error: " . $mysqli->connect_error);
                }

                // 取得したいユーザー名を変数に代入
                $user = filter_input(INPUT_POST, 'name');

                // プリペアドステートメントを作成してSQL文を準備
                $stmt = $mysqli->prepare("SELECT password FROM user WHERE username = ?");

                // プレースホルダに値をバインド
                $stmt->bind_param("s", $user);

                // SQL文を実行
                $stmt->execute();

                // 結果をフェッチして変数に代入
                $stmt->bind_result($password);
                $stmt->fetch();

                // ステートメントを閉じる
                $stmt->close();

                // データベースの接続を切断
                $mysqli->close();

                return $password;

            }

            
            $input_username = filter_input(INPUT_POST, 'name');
            $input_password = filter_input(INPUT_POST, 'pass');

            // POSTメソッドのときのみ実行
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // if (password_verify( filter_input(INPUT_POST, 'pass') , get_password( filter_input(INPUT_POST, 'name') ))){
                if (password_verify( $input_password , get_password( $input_username ))){

                    // 認証が成功したとき
                    // セッションIDの追跡を防ぐ
                    session_regenerate_id(true);
                    // ユーザ名をセット
                    $_SESSION['username'] = $input_username;


                    // ログイン完了後に / に遷移
                    header('Location: /index.php');

                    exit;

                } else {

                    echo "ID or password is incorrect";

                }
            }

            header('Content-Type: text/html; charset=UTF-8');


        ?>

        <form class="space-y-6" action="login_process.php" method="POST">
            <div>
            <label for="id" class="block text-sm font-medium leading-6 text-gray-900">ID</label>
            <div class="mt-2">
                <input id="id" name="id" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            </div>
    
            <div>
            <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="text-sm">
                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div>
            </div>
            <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            </div>
    
            <div>
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
        </form>
    
        <p class="mt-10 text-center text-sm text-gray-500">
            Setup before?
            <a href="setup.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Try setup</a>
        </p>
        </div>
  </div>