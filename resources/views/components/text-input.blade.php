@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border border-[#D9D9D9] placeholder-[#737373] rounded-2xl w-full p-4']) }}>
