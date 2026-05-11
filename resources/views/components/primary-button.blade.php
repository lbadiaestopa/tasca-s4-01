<button {{ $attributes->merge(['type' => 'submit', 'class' => ' border border-black bg-black text-white w-full mt-2 py-2']) }}>
    {{ $slot }}
</button>
