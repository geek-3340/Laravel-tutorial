<?php
// このコントローラーは、web.php内でルート設定されています。

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Userモデルを使用する

class TestController extends Controller
{
    // 以下のコード以外は、Laravelの標準的なコントローラーの構造でsailコマンドで作成時に自動生成されるものです。
    // 以下はtestメソッドで、Userモデルを使用してデータベースから全ユーザーを取得し、'test'ビューに渡す処理を行います。
    public function test(){
        $users=User::all();
        return view('test',compact('users')); // 'test'ビューにユーザーデータを渡す
    }
}
