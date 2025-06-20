{{--
    以下のTailwind CSSで書かれたスタイルを変更したときは
    sail npm run dev
    を実行して、CSSを再ビルドする必要があります。
    これにより、Tailwind CSSの変更がlocalhostに反映されます。

    また本番環境では
    sail npm run build
    を実行して、CSSをビルドする必要があります。
    これにより、最適化されたCSSが生成され、本番環境で
    より効率的に配信されます。
--}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xl text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
