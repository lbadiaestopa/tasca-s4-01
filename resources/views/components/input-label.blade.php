@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-[#1B1A1A] mt-4']) }}>
    {{ $value ?? $slot }}
</label>
