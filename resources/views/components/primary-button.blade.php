<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-second border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-main transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
