<x-guest-layout>
    <form method="POST" action="{{ route('orchestras.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="e. g. OBC" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" placeholder="e. g. Barcelona" :value="old('city')" required autocomplete="address-level2" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Venue -->
        <div class="mt-4">
            <x-input-label for="venue" :value="__('Venue')" />
            <x-text-input id="venue" class="block mt-1 w-full" type="text" name="venue" placeholder="e. g. L'Auditori" :value="old('venue')" required autocomplete="organization" />
            <x-input-error :messages="$errors->get('venue')" class="mt-2" />
        </div>

        <!-- Submit -->
        <div class="mt-6">
            <x-primary-button>
                {{ __('Finish') }}
            </x-primary-button>
        </div>

        <!-- Login link -->
        <div class="flex items-center justify-center mt-4">
            <a class="underline text-sm text-[#737373] hover:text-[#1B1A1A] rounded-md" href="{{ route('login') }}">
                {{ __('Already registered? Log In.') }}
            </a>
        </div>
    </form>
</x-guest-layout>
