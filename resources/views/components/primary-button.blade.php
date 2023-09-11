<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-black border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rgb(36, 238, 110) transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
