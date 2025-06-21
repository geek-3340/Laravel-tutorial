{{-- app/Http/Controllers/TestControllerから参照 --}}
{{-- 以下を表示 --}}
Hello World!
<p>ーーーーーーーーーーー</p>
{{--
    TestControllerから渡された全ユーザーデータを元に
    foreachを用いて各ユーザーデータで処理を回す。
--}}
@foreach ($users as $user)
<h3>Users Data</h3>
{{-- ユーザー名とメールアドレスを表示 --}}
<p>{{ $user->name }}</p>
<p>{{ $user->email }}</p>    
<p>ーーーーーーーーーーー</p>
@endforeach