<x-app-layout>
    <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-x-4 md:gap-x-6 w-full mt-20">
        <div class="col-span-4 md:col-start-3 lg:col-start-5 flex justify-center">
            <form class="w-full" method="POST" action="{{ route('orchestra.create') }}">
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
                        {{ __('Create') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
