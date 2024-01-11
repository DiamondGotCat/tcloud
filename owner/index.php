<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h1 class="text-5xl text-center">tCloud NEXT</h1>
      <link rel="stylesheet" href="style.css">
      <script src="https://cdn.tailwindcss.com"></script>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm text-center">
    
  <?php

        require_once '../functions.php';
        require_logined_session();

        require_once '../sub.php';
        if ( isOwner( session_user() ) ) {

            

        } else {

            die("あなたはオーナーではありません。");

        }

    ?>

    <a href="./add_member.php" class="link">
        メンバーを追加
    </a>

    <a href="" class="link">
        メンバーを削除
    </a>

    <style>

        .link {

            font-weight: bold;
            color: #6495ED;

        }

    </style>

  </div>

</div>