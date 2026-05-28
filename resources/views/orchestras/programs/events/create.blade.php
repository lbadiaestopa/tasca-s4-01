<x-app-layout>
    <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-x-4 md:gap-x-6 w-full mt-20">
        <div class="col-span-4 md:col-start-3 lg:col-start-5 flex justify-between items-end mt-6">
            <a href="{{ route('programs.show', [$orchestra, $program]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 -960 960 960" width="1.5rem" fill="#000000">
                    <path d="M400-240 160-480l240-240 56 58-142 142h486v80H314l142 142-56 58Z" /></svg>
            </a>
            <h2 class="font-semibold text-center">Create event</h2>
            <div class="h-6 w-6"></div>
        </div>

        <div class="col-span-4 md:col-start-3 lg:col-start-5 flex justify-center mt-4">
            <form class="w-full" method="POST" action="{{ route('event.store', [$orchestra, $program]) }}">

                @csrf

                <input type="hidden" name="orchestra_id" value="{{ $orchestra->id }}">
                <input type="hidden" name="program_id" value="{{ $program->id }}">

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="e.g. Mahler Symphony No. 5" :value="old('name')" required autofocus />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Type -->
                <div class="mt-4">
                    <x-input-label for="type" :value="__('Type')" />

                    <select id="type" name="type" class="block mt-1 w-full border-gray-300" required>
                        <option value="">Select a type</option>

                        <option value="rehearsal" {{ old('type') === 'rehearsal' ? 'selected' : '' }}>
                            Rehearsal
                        </option>

                        <option value="concert" {{ old('type') === 'concert' ? 'selected' : '' }}>
                            Concert
                        </option>

                        <option value="soundcheck" {{ old('type') === 'soundcheck' ? 'selected' : '' }}>
                            Soundcheck
                        </option>
                    </select>

                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <!-- Venue -->
                <div class="mt-4">
                    <x-input-label for="venue" :value="__('Venue')" />

                    <x-text-input id="venue" class="block mt-1 w-full" type="text" name="venue" placeholder="e.g. Palau de la Música" :value="old('venue')" required />

                    <x-input-error :messages="$errors->get('venue')" class="mt-2" />
                </div>

                <!-- Start Date -->
                <div class="mt-4">
                    <x-input-label for="start_date" :value="__('Start Date')" />

                    <x-text-input id="start_date" class="block mt-1 w-full" type="datetime-local" name="start_date" :value="old('start_date')" required />

                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                </div>

                <!-- End Date -->
                <div class="mt-4">
                    <x-input-label for="end_date" :value="__('End Date')" />

                    <x-text-input id="end_date" class="block mt-1 w-full" type="datetime-local" name="end_date" :value="old('end_date')" required />

                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                </div>

                <!-- Submit -->
                <div class="mt-6">
                    <x-primary-button>
                        {{ __('Create Event') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
