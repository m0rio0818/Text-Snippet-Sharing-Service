<?php

namespace Helpers;

use Database\MySQLWrapper;
use DateInterval;
use DateTime;
use Exception;

class DatabaseHelper
{
    public static function createNewSnippetHelper(string $highlight, string $title, string $validTime, string $content, string $hashedVal, bool $publish)
    {
        $db = new MySQLWrapper();

        $expiredAt = new DateTime();
        $valiable_Time = ValidationHelper::getExpirationTime();

        if ($validTime !== "Never") {
            switch ($validTime) {
                case "10 Min":
                    $expiredAt = new DateTime();
                    $expiredAt->add(new DateInterval('PT10M')); // 10分後の日時
                    break;
                case "1 Hour":
                    $expiredAt = new DateTime();
                    $expiredAt->add(new DateInterval('PT1H')); // 1時間後の日時
                    break;
                case "1 Day":
                    $expiredAt = new DateTime();
                    $expiredAt->add(new DateInterval('PT1D')); // 1日後の日時
                    break;
                case "1 Week":
                    $expiredAt = new DateTime();
                    $expiredAt->add(new DateInterval('P1W')); // 1週間後の日時
                    break;
                case "1 Month":
                    $expiredAt = new DateTime();
                    $expiredAt->add(new DateInterval('P1M')); // 1ヶ月後の日時
                    break;
                default:
                    // 何もしない
                    break;
            }
        }

        // フォーマットしてMySQLのDATETIME形式に変換
        if ($expiredAt !== null) {
            $expiredAtFormatted = $expiredAt->format('Y-m-d H:i:s');
        } else {
            $expiredAtFormatted = null;
        }

        // $add_time = $timeValid[$validTime];
        // $add_time 
        // $expired_at->add(new DateInterval($add_time));
        // $expiredAtFormatted = $expired_at->format('Y-m-d H:i:s');

        // プリペアドステートメントを作成
        $stmt = $db->prepare("INSERT INTO snippets 
            (title, url, language, content, expiration, publish,  expire_at)
            VALUES (?, ?, ?, ?, ?, ?, ? )
            ");
        $stmt->bind_param('sssssis', $title, $hashedVal, $highlight, $content, $validTime, $publish, $expiredAtFormatted);
        $insertSuccess  = $stmt->execute(); // ステートメントをクローズ
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
