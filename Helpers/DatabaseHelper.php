<?php

namespace Helpers;

use Database\MySQLWrapper;
use DateInterval;
use DateTime;
use Exception;

class DatabaseHelper
{
    public static function createNewSnippetHelper(string $highlight, string $title, string $validTime, string $content, string $hashedVal)
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

        // $hashed_url = "http://localhost:8000/snippet/" . $hashedVal;
        // プリペアドステートメントを作成
        $stmt = $db->prepare("INSERT INTO snippets 
            (title, url, language, content, expire_at)
            VALUES (?, ?, ?, ?, ?)
            ");
        $stmt->bind_param('sssss', $title, $hashedVal, $highlight, $content, $expiredAtFormatted);
        $insertSuccess  = $stmt->execute(); // ステートメントをクローズ
        $stmt->close();
        return $insertSuccess;
    }

    public static function getSnippeter(string $url): array
    {
        $db = new MySQLWrapper();
        $stmt = $db->prepare("SELECT content, language FROM snippets WHERE url = ?");
        $stmt->bind_param('s', $url);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $data = $result->fetch_assoc();
        return $data;
    }
}
