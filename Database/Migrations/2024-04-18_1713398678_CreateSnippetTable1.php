<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateSnippetTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return [
            "CREATE TABLE snippets(
                id INT PRIMARY KEY AUTO_INCREMENT,
                title VARCHAR(255),
                url VARCHAR(255) NOT NULL,
                language VARCHAR(255) NOT NULL,
                content TEXT NOT NULL,
                expiration TEXT NOT NULL,
                publish BOOLEAN NOT NULL,
                expire_at DATETIME NOT NULL,
                created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
            )"
        ];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [
            "DROP TABLE snippets"
        ];
    }
}
