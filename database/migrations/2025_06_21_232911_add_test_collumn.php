<?php
// usersテーブルのカラムを変更・追加するマイグレーションファイル

// 【このファイルのようなマイグレーションファイルを作成するコマンド】
// 【例】ファイル名：add_test_collumn.php
// sail artisan make:migration add_test_collumn_to_users_table --table=users

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // UPメソッド：コマンドでmigrateを実行すると呼び出される
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // ここにusersテーブルのカラムを変更・追加する処理を記述します。
            // usersテーブルにtestカラムを追加する
            $table->string('test')->after('email');
        });
    }

    // DOWNメソッド：コマンドでmigrate:rollbackを実行すると呼び出される
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // 変更・追加用のファイルでは、ここに手動で元に戻す処理を記述します。
            // usersテーブルからtestカラムを削除する
            $table->dropColumn('test');
        });
    }
};

// sail artisan migrateで反映

// Tips
    // カラム名の変更

        // $table->renameColumn('対象の現在カラム名', '新しいカラム名');
    // カラムの型変更
        // $table->新しいデータ型('対象カラム名')->change();

    // カラムのオプションを追加：->change
        // $table->対象カラムのデータ型('対象カラム名')->追加するオプション->change();