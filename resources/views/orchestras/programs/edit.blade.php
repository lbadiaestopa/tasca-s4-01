<x-app-layout>
    <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-x-4 md:gap-x-6 w-full mt-20">
        <div class="col-span-4 md:col-start-3 lg:col-start-5 flex justify-center">
            <form class="w-full" method="POST" action="{{ route('programs.update', [$orchestra, $program]) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $program->name)" required autofocus />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Start Date -->
                <div class="mt-4">
                    <x-input-label for="start_date" :value="__('Start Date')" />

                    <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date', $program->start_date)" required />

                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                </div>

                <!-- End Date -->
                <div class="mt-4">
                    <x-input-label for="end_date" :value="__('End Date')" />

                    <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date', $program->end_date)" required />

                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                </div>

                <!-- Submit -->
                <div class="mt-6">
                    <x-primary-button>
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
