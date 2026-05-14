@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border border-[#D9D9D9] placeholder-[#737373] rounded-2xl w-full py-3 focus:border-[#D9D9D9] focus:ring-0 focus:outline-none']) }}>
