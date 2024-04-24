<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"> -->

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Text Snipetter</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<header>
    <div class="d-flex font-medium justify-end text-center text-gray-500 underline-b">
        <ul class="flex flex-wrap justify-end -mb-px">
            <li id="editor" value="on" class="me-2 border-b-2 border-green-500">
                <a href="/" class="inline-block p-4 rounded-t-lg text-green-500 hover:border-gray-300" style="text-decoration:none;">
                    create New
                </a>
            </li>
            <li id="exercices" value="off" class="me-2 border-b-2 hover:border-gray-400">
                <a href="/snippet_List" class="active inline-block p-4 rounded-t-lg text-gray-500 hover:text-black hover:border-gray-300" style="text-decoration:none;">
                    Snippet List
                </a>
            </li>
        </ul>
    </div>
</header>

<body>
    <main class="container mt-5 mb-5">