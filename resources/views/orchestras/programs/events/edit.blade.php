<x-app-layout>
    <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-x-4 md:gap-x-6 w-full mt-20">
        <div class="col-span-4 md:col-start-3 lg:col-start-5 flex justify-between items-end mt-6">
            <a href="/orchestras">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 -960 960 960" width="1.5rem" fill="#000000">
                    <path d="M400-240 160-480l240-240 56 58-142 142h486v80H314l142 142-56 58Z" /></svg>
            </a>
            <h2 class="font-semibold text-center">Edit event details</h2>
            <div class="h-6 w-6"></div>
        </div>

        <div class="col-span-4 md:col-start-3 lg:col-start-5 flex justify-center mt-4">
            <form class="w-full" method="POST" action="{{ route('events.update', [$orchestra, $program, $event]) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <x-input-label for="name" value="Name" />

                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $event->name)" required />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Type -->
                <div class="mt-4">
                    <x-input-label for="type" value="Type" />

                    <select id="type" name="type" class="block mt-1 w-full border-gray-300 rounded-md">

                        @foreach(['rehearsal', 'concert', 'soundcheck'] as $type)
                        <option value="{{ $type }}" @selected(old('type', $event->type) === $type)>
                            {{ ucfirst($type) }}
                        </option>
                        @endforeach

                    </select>

                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <!-- Venue -->
                <div class="mt-4">
                    <x-input-label for="venue" value="Venue" />

                    <x-text-input id="venue" class="block mt-1 w-full" type="text" name="venue" :value="old('venue', $event->venue)" required />

                    <x-input-error :messages="$errors->get('venue')" class="mt-2" />
                </div>

                <!-- Start Date -->
                <div class="mt-4">
                    <x-input-label for="start_date" value="Start Date" />

                    <x-text-input id="start_date" class="block mt-1 w-full" type="datetime-local" name="start_date" :value="old('start_date', $event->start_date->format('Y-m-d H:i'))" required />

                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                </div>

                <!-- End Date -->
                <div class="mt-4">
                    <x-input-label for="end_date" value="End Date" />

                    <x-text-input id="end_date" class="block mt-1 w-full" type="datetime-local" name="end_date" :value="old('end_date', $event->end_date->format('Y-m-d H:i'))" required />

                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <x-primary-button>
                        Save
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
