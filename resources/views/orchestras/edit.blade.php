<x-app-layout>
    <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-x-4 md:gap-x-6 w-full mt-20">
        <div class="col-span-4 md:col-start-3 lg:col-start-5 flex justify-center">
            <form class="w-full" method="POST" action="{{ route('orchestra.update', $orchestra->id) }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="ms-2" />
                    <x-text-input id="name" class="blockw-full mt-1" type="text" name="name" :value="old('name', $orchestra->name)" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- City -->
                <div class="mt-4">
                    <x-input-label for="city" :value="__('City')" class="ms-2" />
                    <x-text-input id="city" class="blockw-full mt-1" type="text" name="city" :value="old('name', $orchestra->city)" required autocomplete="address-level2" />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <!-- Venue -->
                <div class="mt-4">
                    <x-input-label for="venue" :value="__('Venue')" class="ms-2" />
                    <x-text-input id="venue" class="blockw-full mt-1" type="text" name="venue" :value="old('name', $orchestra->venue)" required autocomplete="organization" />
                    <x-input-error :messages="$errors->get('venue')" class="mt-2" />
                </div>

                <!-- Submit -->
                <div class="mt-4">
                    <x-primary-button>
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
