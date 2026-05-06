<button {{ $attributes->merge(['type' => 'button', 'class' => 'border border-black w-full py-2 mt-6']) }}>
    {{ $slot }}
</button>
