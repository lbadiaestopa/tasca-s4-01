<button {{ $attributes->merge(['type' => 'submit', 'class' => 'border border-black rounded-2xl w-full py-4']) }}>
    {{ $slot }}
</button>
