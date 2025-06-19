<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route設定の書き方
// Route:HTTPメソッド('URL',[コントローラー名::class, 'メソッド名'])
// ->name('ルート名');

// << HTTPメソッド >>
// GET, POST, PUT(patch), DELETEがあります。
// GETメソッド：データの取得に使用され、URLに指定されたリソースを取得します。
// POSTメソッド：データの送信に使用され、新しいリソースを作成するために使用されます。
// PUT(patch)メソッド：既存のリソースの更新に使用されます。
// DELETEメソッド：指定されたリソースを削除するために使用されます。

// << URL >>
// URLは、リクエストを受け付けるパスを指定します。
// ルート設定では、ドメイン以下のパスを指定します。
// 以下の場合、'/hello'をブラウザでリクエストするときはhttps://localhost/helloとなります。

// << コントローラー名とメソッド名 >>
// コントローラー名とメソッド名には、URLがリクエストされたときに実行される処理を定義した
// コントローラーのクラス名とメソッド名を指定します。
// 以下の場合、TestControllerクラスのtestメソッドが呼び出されます。

// 使用するコントローラーは、ルート設定ファイルにインポートする必要があります。
// これにはuse宣言を用いて、コントローラーへのパスを指定します。
// 以下では、TestControllerが使用されているため、App\Http\Controllers\TestControllerをインポートしています。

// << ルート名 >>
// ルート名は、ルートを識別するための名前で、後でURLを生成する際に使用されます。
// ルート名は、nameメソッドを使用して設定します。
// ルート名を設定することで、URLを直接指定する代わりに、ルート名を使用してURLを生成することができます。
// 例えば、`route('test')`とすることで、`/hello`のURLを生成できます。
// ルート名は、アプリケーション内で一意である必要があります。

use App\Http\Controllers\TestController;

Route::get('/hello',[TestController::class,'test'])->name('test');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
