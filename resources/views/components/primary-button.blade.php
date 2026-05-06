<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-black text-white w-full mt-4 py-2 border border-black']) }}>
    {{ $slot }}
</button>
