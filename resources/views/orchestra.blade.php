<x-app-layout>
    <div class="col-span-full flex flex-col">
        <header>
            <h2 class="col-span-full text-xl leading-9 mb-2">
                {{ __('Orchestra Information') }}
            </h2>

            <p class="mt-1 text-sm text-[#737373]">
                {{ __("Update your orchestra's information.") }}
            </p>
        </header>
    </div>

    <div class="col-span-4 flex flex-col">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="city" :value="__('City')" />
                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" autocomplete="address-level2" />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
            </div>

            <div>
                <x-input-label for="venue" :value="__('Venue')" />
                <x-text-input id="venue" name="venue" type="text" class="mt-1 block w-full" autocomplete="organization" />
                <x-input-error class="mt-2" :messages="$errors->get('venue')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
                @endif
            </div>
        </form>
    </div>

</x-app-layout>
