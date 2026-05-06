@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border border-[#D9D9D9] mb-4 p-2 w-full']) }}>
