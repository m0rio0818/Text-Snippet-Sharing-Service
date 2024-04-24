<?php

use Helpers\DatabaseHelper;
use Helpers\ValidationHelper;
use Response\HTTPRenderer;
use Response\Render\JSONRenderer;
use Response\Render\HTMLRenderer;

return [
    '' => function (): HTMLRenderer  | JSONRenderer {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method == "GET") {
            $validTime = array_keys(ValidationHelper::getExpirationTime());
            $syntaxHighLight = ValidationHelper::getSyntaxHighlight();
            return new HTMLRenderer('component/topPage', [
                'validTime' => $validTime,
                'syntaxHighLight' => $syntaxHighLight,
            ]);
        }
        // POST method
        else {
            $json_data = file_get_contents('php://input');
            // JSONデータをデコードして連想配列に変換する
            $data = json_decode($json_data, true);

            $highlight = $data["syntax_highlight"];
            $title = $data["title"];
            $validTime = $data["validTime"];
            $content = $data["content"];
            $hashedValue = hash('sha256', uniqid(mt_rand(), true));

            $inserted = DatabaseHelper::createNewSnippetHelper($highlight, $title, $validTime, $content, $hashedValue);

            if ($inserted) {
                return new JSONRenderer(["success" => true, "url" => "snippet?={$hashedValue}"]);
            } else {
                return new JSONRenderer(["success" => false]);
            }
        }
    },
    'snippet' => function (): HTMLRenderer {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == "GET") {
            $currentUrl = $_SERVER['REQUEST_URI'];
            $urlParts = explode('/', $currentUrl);

            $snippetPath = $urlParts[2];
            // var_dump($urlParts);

            // 必要に応じて、パスから不要な部分を削除する


            $data = DatabaseHelper::getSnippeter($snippetPath);
            $content = $data["content"];
            $language  = $data["language"];


            return new HTMLRenderer('component/snippet', ["content" => $content, "language" => $language]);
        }
    }
];
