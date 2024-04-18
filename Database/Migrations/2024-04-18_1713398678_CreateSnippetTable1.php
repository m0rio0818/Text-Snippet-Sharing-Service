<?php

namespace Database\Migrations;

use Database\SchemaMigration;

class CreateSnippetTable1 implements SchemaMigration
{
    public function up(): array
    {
        // マイグレーションロジックをここに追加してください
        return [
            "CREATE TABLE snippet()"
        ];
    }

    public function down(): array
    {
        // ロールバックロジックを追加してください
        return [];
    }
}