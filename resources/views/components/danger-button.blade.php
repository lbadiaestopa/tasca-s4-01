<button {{ $attributes->merge(['type' => 'submit', 'class' => ' bg-red-500 text-white rounded-2xl w-full py-3']) }}>
    {{ $slot }}
</button>
