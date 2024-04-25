<?php

namespace Helpers;

use Database\MySQLWrapper;
use DateInterval;
use DateTime;
use DateTimeZone;
use Exception;

class DatabaseHelper
{
    public static function createNewSnippetHelper(string $highlight, string $title, string $validTime, string $content, string $hashedVal, bool $publish)
    {
        $db = new MySQLWrapper();

        $expiredAt = new DateTime('now', new DateTimeZone('Asia/Tokyo'));
        $valiable_Time = ValidationHelper::getExpirationTime();

        if ($validTime !== "never") {
            $expiredAt->add(new DateInterval($valiable_Time[$validTime]));
            $expiredAtFormatted = $expiredAt->format('Y-m-d H:i:s');
        } else {
            $expiredAtFormatted = null;
        }

        $stmt = $db->prepare("INSERT INTO snippets 
            (title, url, language, content, expiration, publish,  expire_at)
            VALUES (?, ?, ?, ?, ?, ?, ? )
            ");
        $stmt->bind_param('sssssis', $title, $hashedVal, $highlight, $content, $validTime, $publish, $expiredAtFormatted);
        $insertSuccess  = $stmt->execute();
        $stmt->close();
        return $insertSuccess;
    }

    public static function getSnippeter(string $url): array | string
    {
        $db = new MySQLWrapper();
        $stmt = $db->prepare("SELECT * FROM snippets WHERE url = ?");
        $stmt->bind_param('s', $url);
        $stmt->execute();
        $result = $stmt->get_result();
        // 結果が空であるかどうかを確認
        if ($result->num_rows === 0) {
            // 一致するデータが見つからない場合の処理
            return "nodata"; // または他の適切な値を返す
        } else {
            // 一致するデータが見つかった場合の処理
            $data = $result->fetch_assoc();
            return $data;
        }
    }

    public static function getAllSnipetter(): array | string
    {
        $db = new MySQLWrapper();
        $stmt = $db->prepare("SELECT * FROM snippets WHERE publish = 1");
        $stmt->execute();
        $ans = [];
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $ans[] = $row;
        }

        if (!$ans) {
            return "nodata";
        }
        return $ans;
    }
}
