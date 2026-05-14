<button {{ $attributes->merge(['type' => 'submit', 'class' => 'border border-black bg-black text-white rounded-2xl w-full py-4']) }}>
    {{ $slot }}
</button>
