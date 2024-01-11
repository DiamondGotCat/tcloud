<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h1 class="text-5xl text-center">tCloud NEXT</h1>
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Logout</h2>
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.tailwindcss.com"></script>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        
        ログアウトが完了しました。

    </div>

    <style>

        .link {

            font-weight: bold;
            color: #6495ED;

        }

    </style>

</div>