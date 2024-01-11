<?php

require_once __DIR__ . '/functions.php';
require_logined_session();

?>


<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h1 class="text-5xl text-center">tCloud NEXT</h1>
      <link rel="stylesheet" href="style.css">
      <script src="https://cdn.tailwindcss.com"></script>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm text-center">
    
    <?php

        require_once __DIR__ . '/sub.php';

        echo """
        <a href='/""" . session_user() . """/' class='link'>
        My drive
        </a>
        """;

    ?>

    <a href="/logout.php" class="link">
        Logout
    </a>

    <style>

        .link {

            font-weight: bold;
            color: #6495ED;

        }

    </style>

  </div>

</div>