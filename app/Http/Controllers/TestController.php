<!-- このコントローラーは、web.php内でルート設定されています。 -->
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // 以下のコード以外は、Laravelの標準的なコントローラーの構造でsailコマンドで作成時に自動生成されるものです。
    public function test(){
        return view('test');
    }
}
