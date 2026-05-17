<button {{ $attributes->merge(['type' => 'button', 'class' => 'border border-black rounded-2xl w-full py-3']) }}>
    {{ $slot }}
</button>
