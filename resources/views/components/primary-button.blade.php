<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-rose-600 hover:bg-rose-700 px-4 py-2 rounded-full text-white font-semibold transition']) }}>
    {{ $slot }}
</button>
