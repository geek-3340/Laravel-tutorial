{{-- これはcomponent機能を用いて、テンプレートとして使用するviewファイル --}}
{{-- dashboard.blade.phpではこのテンプレートが使用されている --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        {{--
            テンプレートとして使用するファイルでCSSやJSを読み込んでおくことで
            このテンプレートを使用したファイルでも読み込むことができる
            例えば、dashboard.blade.phpではこのテンプレートを使用しているので
            app.cssとapp.jsが読み込まれる
            なお、viteはLaravelのビルドツールで、このようにすることで
            Tailwind CSSやその他のアセットを効率的に管理できる
        --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{--
                includeは他のファイルを参照し、参照したファイルのコードを丸ごと挿入できる
                ここでは、layouts/navigation.blade.phpを参照している
                これにより、ナビゲーションバーのコードをこのテンプレートに挿入している
            --}}
            @include('layouts.navigation')

            <!-- Page Heading -->
            {{--
                以下のコードにおける$headerや$slotはスロットと呼ばれるもので、
                このテンプレートを使用するファイルで内容を指定できる変数のようなものです。

                テンプレートも含めた使用方法としては、使用するファイルにて
                <x-app-layout>
                    <x-slot name="header">
                        <!-- ヘッダーの内容 -->
                    </x-slot>
                    <!-- メインコンテンツ -->
                </x-app-layout>
                のように記述します。
            --}}
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
