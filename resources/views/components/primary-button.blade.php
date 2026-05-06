<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-black text-white w-full mb-8 py-3 md:py-4 border border-black']) }}>
    {{ $slot }}
</button>
