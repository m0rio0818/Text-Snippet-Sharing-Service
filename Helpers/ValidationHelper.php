<?php

namespace Helpers;

class ValidationHelper
{
    public static function checkIsValidText(string $text): array
    {
        if (preg_match('/^\s*$/', $text)) {
            return [
                "status" =>  false,
                "message" => "空白のみのスニペットは生成できません。",
            ];
        }

        $maxCharNum = 65535; // MYSQLのTEXT型の最大文字数

        if (strlen($text) > $maxCharNum) {
            return [
                "status" =>  false,
                "message" => "文字数の大きなスニペットは送信できません。(最大" . $maxCharNum . "文字)",
            ];
        }

        return ["status" => true];
    }

    public static function getSyntaxHighlight(): array
    {
        $syntaxValid = [
            'plaintext'       => 'plaintext',
            'html'       => 'HTML',
            'css'        => 'CSS',
            'javascript' => 'JavaScript',
            'json'       => 'JSON',
            'typescript' => 'TypeScript',
            'python'     => 'Python',
            'java'       => 'Java',
            'c#'         => 'C#',
            'c++'        => 'C++',
            'php'        => 'PHP',
            'ruby'       => 'Ruby',
            'go'         => 'Go',
            'markdown'   => 'Markdown',
            'sql'        => 'SQL',
            'xml'        => 'XML',
            'yaml'       => "yaml"
        ];
        return $syntaxValid;
    }


    public static function getExpiretionKeyValue(): array
    {
        $timeValid = [
            "Never" => "never",
            "10 Min" => "10min",
            "1 Hour" => "1hour",
            "1 Day" => "1day",
            "1 Week" => "1week",
            "1 Month" => "1month",
            "1 Year" => "1year"
        ];
        return $timeValid;
    }

    public static function getExpirationTime(): array
    {
        $timeValid = [
            "never" => null,
            "10min" => "PT10M",
            "1hour" => "PT1H",
            "1day" => "PT1D",
            "1week" => "P1W",
            "1month" => "PT1M",
            "1year" => "PT1Y"
        ];
        return $timeValid;
    }
}
