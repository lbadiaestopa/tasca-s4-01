<x-guest-layout>
    <form method="POST" action="{{ route('join-orchestra.submit') }}">
        @csrf

        <!-- Code -->
        <div>
            <x-input-label for="code" :value="__('Code')" />
            <x-text-input id="code" placeholder="e. g. 12345678A" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('code')" class="mt-2" />
        </div>
        
        <x-primary-button>
            {{ __('Join Orchestra') }}
        </x-primary-button>
    </form>
</x-guest-layout>
