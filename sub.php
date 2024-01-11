<?php

    function session_user(){

        return $_SESSION['username'];

    }

    function isOwner($name){

        require_once __DIR__ . '/db.php';

        // ユーザから受け取ったユーザ名とパスワード

        // mysqliクラスのインスタンスを作成してデータベースに接続
        $mysqli = new mysqli(servername(), username(), password(), dbname());

        // 接続エラーの確認
        if ($mysqli->connect_error) {
            die("Error: " . $mysqli->connect_error);
        }

        // プリペアドステートメントを作成してSQL文を準備
        $stmt = $mysqli->prepare("SELECT isOwner FROM user WHERE username = ?");

        // プレースホルダに値をバインド
        $stmt->bind_param("s", $name);

        // SQL文を実行
        $stmt->execute();

        // 結果をフェッチして変数に代入
        $stmt->bind_result($intOwner);
        $stmt->fetch();

        // ステートメントを閉じる
        $stmt->close();

        // データベースの接続を切断
        $mysqli->close();

        $boolOwner = false;

        if ( $intOwner == 1 ){

            $boolOwner = true;

        }

        return $boolOwner;

    }

?>