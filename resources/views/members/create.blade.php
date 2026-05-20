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

    <form method="POST" action="{{ route('members.store') }}">
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

        <!-- Name -->
        <div class="mt-2">
            <x-text-input
                name="name"
                type="text"
                placeholder="Name"
                class="block w-full"
                :value="old('name')" />
        </div>

        <!-- Last Name -->
        <div class="mt-2">
            <x-text-input
                name="last_name"
                type="text"
                placeholder="Last Name"
                class="block w-full"
                :value="old('last_name')" />
        </div>

        <!-- Email -->
        <div class="mt-2">
            <x-text-input
                name="email"
                type="email"
                placeholder="Email"
                class="block w-full"
                :value="old('email')" />
        </div>

        <!-- Password -->
        <div class="mt-2">
            <x-text-input
                name="password"
                type="password"
                placeholder="Password"
                class="block w-full" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-2">
            <x-text-input
                name="password_confirmation"
                type="password"
                placeholder="Repeat Password"
                class="block w-full" />
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
        </div>

        <!-- Instrument -->
        <div class="mt-2">
            <x-text-input
                name="instrument"
                type="text"
                placeholder="Instrument"
                class="block w-full"
                :value="old('instrument')" />
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
                        {{ $section }}
                    </option>
                @endforeach
            </select>
        </div>

        <x-primary-button class="mt-4">
            Create member
        </x-primary-button>
    </form>
</x-guest-layout>