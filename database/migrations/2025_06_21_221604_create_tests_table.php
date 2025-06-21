<?php
// testテーブルを新規作成するマイグレーションファイル

// 【このファイルのようなマイグレーションファイルを作成するコマンド】
    // マイグレーションファイル(create_tests_table.php)のみを作成する場合は
    // sail artisan make:migration create_tests_table --create=tests

    // マイグレーションファイルとモデル（Test.php）を同時に作成する場合は
    // sail artisan make:model Test -m

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // UPメソッド：コマンドでmigrateを実行すると呼び出される
    public function up(): void
    {
        Schema::create('tests', function (Blueprint $table) {
            // ここにテーブルのカラムを定義します。
                // 新規作成ファイルでは、初期設定でidとtimestampsカラムが定義されている
                // カラムとは"列"のことで、データベースのテーブルに格納されるデータの項目を指します。
                    // idカラム：IDを自動的に生成するためのカラム
                    // timestampsカラム：created_atとupdated_atの2つのカラムを自動的に生成するためのカラム
                        // このカラムは、レコードの作成日時と更新日時を記録します。

                // 【カラムの追加】
                    // カラム定義のルール
                    // $table->データ型('カラム名')->オプション; (オプションは省略可能)
                    // カラム名は英数字とアンダースコア(_)のみ使用可能で、先頭は英字でなければなりません。

                    // よく使用するデータ型
                    // string: 文字列型（VARCHAR）255文字まで
                    // text: 長い文字列型（TEXT）16,384文字程度まで
                    // longText: タグ等を含む文字列型（LONGTEXT）1GB程度まで
                    // integer: 整数型（INTEGER）整数
                    // float: 浮動小数点数型（FLOAT）
                    // double: 倍精度浮動小数点数型（DOUBLE）
                    // boolean: 真偽値型（BOOLEAN）true/false
                    // unsignedBigInteger: 符号なしBIGINT（UNSIGNED BIGINT）他のテーブルのIDなど
                    // date: 日付型（DATE）日付
                    // datetime: 日時型（DATETIME）日時

                    // よく使用するオプション
                    // nullable: NULLを許可する
                    // after('カラム名'): 指定したカラムの後に追加する
                    // default('値'): デフォルト値を設定する
                    // unique: ユニーク制約（重複を禁止）を設定する
                    // index: インデックスを設定する
                    // foreign: 外部キー制約を設定する
                    // primary: 主キー制約を設定する
            
            $table->id();
            $table->timestamps();
        });
    }

    // DOWNメソッド：コマンドでmigrate:rollbackを実行すると呼び出される
    // このメソッドは、upメソッドで行った処理と反対の処理（元に戻す処理）を定義します。
    // 新規作成ファイルでは、downメソッドでの処理＝テーブルを削除する処理となるのでデフォルトで以下のコードが定義されています。
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};

 // ここで設定した内容を元にテーブルそのものを新規作成、削除するコマンド
    // sail artisan migrate:データベースにテーブルを新規作成する
        // ※migrateを実行すると、migrationsテーブルの一番右にbatchカラムが追加されます。
        //   migrationsテーブルでは、migrationsディレクトリのマイグレーションファイルの実行履歴が管理されます。
        //   batchカラムには、何番目のマイグレーションが実行されたかを示す番号が格納されます。
    // sail artisan migrate:rollback:データベースから直近のbatchで作成されたmigrationを取り消す。（ファイル単位）
        // ※取消後は、取り消したmigrationファイルを削除しておくと、次回以降のmigrate実行時にエラーが発生しません。
    // sail artisan migrate:reset:データベースから全てのマイグレーションを取り消す。
    // sail artisan migrate:refresh:データベースをリセットして、全てのマイグレーションを再実行する。(migrate:reset + migrate)
// 【注意】取り消しを行うと、削除したテーブルにあったデータも消えてしまいます。