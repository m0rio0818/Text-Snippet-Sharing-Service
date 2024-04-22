<?php

namespace Helpers;

class ValidationHelper
{
    public static function integer($value, float $min = -INF, float $max = INF): int
    {
        // PHPには、データを検証する組み込み関数があります。詳細は https://www.php.net/manual/en/filter.filters.validate.php を参照ください。
        $value = filter_var($value, FILTER_VALIDATE_INT, ["min_range" => (int) $min, "max_range" => (int) $max]);

        // 結果がfalseの場合、フィルターは失敗したことになります。
        if ($value === false) throw new \InvalidArgumentException("The provided value is not a valid integer.");

        // 値がすべてのチェックをパスしたら、そのまま返します。
        return $value;
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


    public static function getExpirationTime(): array
    {
        $timeValid = [
            "Never" => "never",
            "10 Min" => "10min",
            "1 H" => "1h",
            "1 Day" => "1d",
            "1 Week" => "1w",
            "1 Month" => "1m",
            "1Year" => "1y"
        ];
        return $timeValid;
    }
}
