<x-guest-layout>
    <div class="cols-span-4 flex justify-between items-end mt-6">
        <a href="{{ route('orchestras') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 -960 960 960" width="1.5rem" fill="#000000">
                <path d="M400-240 160-480l240-240 56 58-142 142h486v80H314l142 142-56 58Z" />
            </svg>
        </a>

        <h2 class="font-semibold text-center">Create Member</h2>
        <div class="h-6 w-6"></div>
    </div>

    <form method="POST" action="{{ route('memberships.store') }}">
        @csrf

        <!-- Orchestra -->
        <div class="mt-6">
            <select name="orchestra_id"
                class="border border-[#D9D9D9] rounded-2xl w-full py-3 focus:ring-0 focus:outline-none">
                <option value="">Select Orchestra</option>
                @foreach ($orchestras as $orchestra)
                    <option value="{{ $orchestra->id }}"
                        {{ old('orchestra_id') == $orchestra->id ? 'selected' : '' }}>
                        {{ $orchestra->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('orchestra_id')" class="mt-2" />
        </div>

        <!-- Email (existing user) -->
        <div class="mt-2">
            <x-text-input
                name="email"
                type="email"
                placeholder="User email"
                class="block w-full"
                :value="old('email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Member Type -->
        <div class="mt-4">
            <select name="member_type"
                class="border border-[#D9D9D9] rounded-2xl w-full py-3 focus:ring-0 focus:outline-none">
                <option value="">Member Type</option>
                <option value="core" {{ old('member_type') == 'core' ? 'selected' : '' }}>Core</option>
                <option value="substitute" {{ old('member_type') == 'substitute' ? 'selected' : '' }}>Substitute</option>
                <option value="guest" {{ old('member_type') == 'guest' ? 'selected' : '' }}>Guest</option>
            </select>
            <x-input-error :messages="$errors->get('member_type')" class="mt-2" />
        </div>

        <!-- Instrument -->
        <div class="mt-2">
            <x-text-input
                name="instrument"
                type="text"
                placeholder="Instrument"
                class="block w-full"
                :value="old('instrument')" />
            <x-input-error :messages="$errors->get('instrument')" class="mt-2" />
        </div>

        <!-- Section -->
        <div class="mt-2">
            <select name="section"
                class="border border-[#D9D9D9] rounded-2xl w-full py-3 focus:ring-0 focus:outline-none">
                <option value="">Section</option>
                @foreach ([
                    'violin_1','violin_2','viola','cello','double_bass',
                    'french_horn','trumpet','trombone','tuba',
                    'flute','oboe','clarinet','bassoon',
                    'percussion','mallet','vocal','other'
                ] as $section)
                    <option value="{{ $section }}"
                        {{ old('section') == $section ? 'selected' : '' }}>
                        {{ str($section)->replace('_', ' ')->title() }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('section')" class="mt-2" />
        </div>

        <x-primary-button class="mt-6 w-full">
            Create member
        </x-primary-button>
    </form>
</x-guest-layout>