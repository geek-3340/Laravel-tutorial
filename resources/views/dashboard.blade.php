<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--
                        Laravel Breezeのようなライブラリには再利用性の高いコンポーネントがあり
                        viewディレクトリのcomponentsディレクトリに格納されています。
                        以下ではcomponentsディレクトリにあるprimary-buttonコンポーネントを使用しています。

                        コンポーネントの使用方法については
                        <x-primary-button>
                            ボタンのテキスト
                        </x-primary-button>
                        のように、コンポーネント名を指定し、その中にボタンのテキストを記述します。
                    --}}
                    <x-primary-button>
                        PUSH!!
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
