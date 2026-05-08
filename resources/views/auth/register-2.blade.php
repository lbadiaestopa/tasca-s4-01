<x-guest-layout>
        <x-primary-button class="flex items-center justify-center mt-4">
            <a href="{{ route('join-orchestra') }}">
                {{ __('I have an orchestra code') }}
            </a>
        </x-primary-button>

        <x-secondary-button class="flex items-center justify-center mt-4">
            <a href="{{ route('dashboard') }}">
                {{ __('Create an administrator account') }}
            </a>
        </x-secondary-button>
</x-guest-layout>
