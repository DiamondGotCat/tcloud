<?php

    mkdir( $_GET['dirname'] );
    // ファイルを書き込みモードで開く
    $meow = fopen( "./" . $_GET['dirname'] . "/index.php", "w");

    // ファイルへデータを書き込み
    fwrite( $meow, "
    
<?php

require_once __DIR__ . '/../functions.php';
require_logined_session();
error_reporting(0);

?>


<div class='flex min-h-full flex-col justify-center px-6 py-12 lg:px-8'>
  <div class='sm:mx-auto sm:w-full sm:max-w-sm'>
      <h1 class='text-5xl text-center'>tCloud NEXT</h1>
      <h2 class='mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900'> " . $_GET['dirname'] . "'s drive </h2>
      <link rel='stylesheet' href='style.css'>
      <script src='https://cdn.tailwindcss.com'></script>
  </div>

  <div class='mt-10 sm:mx-auto sm:w-full sm:max-w-sm text-center'>

  <?php

    require_once __DIR__ . '/../sub.php';
    if ('" . $_GET['dirname'] . "' != session_user()){

        die('あなたは、このページにアクセスする権限がありません。');

    }

  ?>
    
  <font color='orange'>

    <?php
        \$temporary_file = \$_FILES['user_file_name']['tmp_name']; # 一時ファイル名
        \$true_file = \$_FILES['user_file_name']['name']; # 本来のファイル名

        # is_uploaded_fileメソッドで、一時的にアップロードされたファイルが本当にアップロード処理されたかの確認
        if (is_uploaded_file(\$temporary_file)) {
            if (move_uploaded_file(\$temporary_file , \$true_file )) {
                echo \$true_file . 'is Uploaded!';
            } else {
                echo 'Error.';
            }
        } else {
            echo 'File not selected.';
        }
        var_dump(\$true_file);
    ?>

    </font>

    <br><br>
    <form enctype='multipart/form-data'  action='index.php' method='POST'>
        <input type='hidden' name='name' value='value' />
        <input name='user_file_name' type='file' />
        <input type='submit' value='Upload' />
    </form>

    <br><br>

    <h2 class='text-xl'>Files</h2>

    <?PHP
    \$dirpath = './';	//表示対象のディレクトリパス
    \$dirlist = dir(\$dirpath);
        while( \$filename = \$dirlist->read() ){
        //ディレクトリの場合は表示対象外（＝ファイルのみ表示）
        if( (is_dir(\$filename) == false) && (\$filename!='..' || \$filename!= '.' ) ){
            if (\$filename !== 'index.php' && \$filename !== '._index.php'){
            print('<a href=\'/download.php?author=" . $_GET['dirname'] . "&path=' .  \$filename . '\'><button>'.\$filename.'</button></a><br>\n');
            }
        }
        }
        \$dirlist->close();
    ?>

    <style>

        .link {

            font-weight: bold;
            color: #6495ED;

        }

    </style>

  </div>

</div>
    
");

    // ファイルを閉じる
    fclose($meow);

?>