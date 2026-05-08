<x-guest-layout>
    <div class="flex flex-col col-span-4">
        <a href="{{ route('join-orchestra') }}" class="border border-black bg-black text-white w-full mt-2 py-2 text-center">
            {{ __('I have an orchestra code') }}
        </a>

        <a href="{{ route('dashboard') }}" class="border border-black w-full py-2 mt-6 text-center">
            {{ __('Create an administrator account') }}
        </a></div>
</x-guest-layout>
