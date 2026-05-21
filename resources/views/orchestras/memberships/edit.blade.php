<x-app-layout>
    <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-x-4 md:gap-x-6 w-full mt-20">

        <div class="col-span-4 md:col-start-3 lg:col-start-5 flex justify-between items-end mt-6">
            <a href="{{ route('members.show', [$orchestra, $membership]) }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 -960 960 960" width="1.5rem" fill="#000000">
                    <path d="M400-240 160-480l240-240 56 58-142 142h486v80H314l142 142-56 58Z" />
                </svg>
            </a>

            <h2 class="font-semibold text-center">Edit membership</h2>
            <div class="h-6 w-6"></div>
        </div>

        <div class="col-span-4 md:col-start-3 lg:col-start-5 flex justify-center mt-4">

            <form class="w-full" method="POST" action="{{ route('memberships.update', [$orchestra, $membership]) }}">
                @csrf
                @method('PUT')

                <!-- Member type -->
                <div>
                    <x-input-label for="member_type" value="Member type" class="ms-2" />

                    <select id="member_type" name="member_type" class="border border-[#D9D9D9] rounded-2xl w-full py-3 focus:ring-0 focus:outline-none" required>
                        @foreach(['core', 'substitute', 'guest'] as $type)
                        <option value="{{ $type }}" @selected(old('member_type', $membership->member_type) === $type)
                            >
                            {{ ucfirst($type) }}
                        </option>
                        @endforeach
                    </select>

                    <x-input-error :messages="$errors->get('member_type')" class="mt-2" />
                </div>

                <!-- Instrument -->
                <div class="mt-4">
                    <x-input-label for="instrument" value="Instrument" class="ms-2" />

                    <x-text-input id="instrument" name="instrument" type="text" class="block w-full mt-1" :value="old('instrument', $membership->instrument)" required />

                    <x-input-error :messages="$errors->get('instrument')" class="mt-2" />
                </div>

                <!-- Section -->
                <div class="mt-4">
                    <x-input-label for="section" value="Section" class="ms-2" />

                    <select id="section" name="section" class="border border-[#D9D9D9] rounded-2xl w-full py-3 focus:ring-0 focus:outline-none" required>
                        @foreach([
                        'violin_1','violin_2','viola','cello','double_bass',
                        'french_horn','trumpet','trombone','tuba',
                        'flute','oboe','clarinet','bassoon',
                        'percussion','mallet','vocal','other'
                        ] as $section)
                        <option value="{{ $section }}" @selected(old('section', $membership->section) === $section)
                            >
                            {{ str($section)->replace('_', ' ')->title() }}
                        </option>
                        @endforeach
                    </select>

                    <x-input-error :messages="$errors->get('section')" class="mt-2" />
                </div>

                <!-- Submit -->
                <div class="mt-6">
                    <x-primary-button>
                        Save
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
