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
                return new JSONRenderer(["success" => true, "url" => "snippet/{$hashedValue}"]);
            } else {
                return new JSONRenderer(["success" => false]);
            }
        }
    },
    "snippet" => function () {
        $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        echo $url;
        return new HTMLRenderer('component/snippet', []);
    }
];
