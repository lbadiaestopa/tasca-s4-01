@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#D9D9D9] text-sm font-medium leading-5 text-[#1B1A1A] focus:outline-none focus:border-[#737373] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#737373] hover:text-[#1B1A1A] hover:border-[#D9D9D9] focus:outline-none focus:text-[#1B1A1A] focus:border-[#D9D9D9] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
