<x-app-layout>
    <div class="relative flex min-h-screen gap-3" x-data="{ open: false, sidebarOpen: true }">
        <aside :class="sidebarOpen ? 'w-80' : 'w-8'" class="sticky top-0 h-dvh ml-4 transition-all duration-300 overflow-hidden shrink-0 min-w-0 flex flex-col pt-4">
            <button @click="sidebarOpen = !sidebarOpen" class="w-8 h-8 flex items-center justify-center rounded-md hover:bg-[#F2F2F2] transition mb-2 shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#000000">
                    <path d="M144-264v-72h672v72H144Zm0-180v-72h672v72H144Zm0-180v-72h672v72H144Z" />
                </svg>
            </button>

            <div x-show="sidebarOpen" x-transition class="flex-1 min-h-0 flex flex-col">
                <x-orchestra-tree :orchestras="$orchestras" />
            </div>
        </aside>

        <main class="flex-1 mt-8 mr-3">
            <div class="flex justify-between">
                <h1 class="font-semibold text-2xl">{{ $orchestra->name }}</h1>

                <div class="flex gap-2">
                    <a href="{{ route('orchestras.edit', $orchestra) }}" class="px-4 py-1 border rounded-xl">Edit</a>

                    <form action="{{ route('orchestras.destroy', $orchestra) }}" method="POST" class="px-4 py-1 border rounded-xl">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="flex gap-2">
                <p>{{ $orchestra->venue }}</p>

                <p>·</p>

                <p>{{ $orchestra->city }}</p>
            </div>

            <h2 class="mt-6 text-xl">Orchestra members</h2>

            @php
            $groupedMembers = $orchestra->memberships->groupBy('section');
            @endphp

            @foreach($groupedMembers as $section => $members)

            <div class="bg-[#FAFAFA] border rounded-lg px-4 py-2 mt-2">
                <h2 class="font-semibold">{{ str($section)->replace('_', ' ')->title() }}</h2>

                <ul>
                    @foreach($members as $membership)
                    <li>
                        <a href="{{ route('members.show', [$orchestra, $membership]) }}">
                            {{ $membership->user->name }}
                            {{ $membership->user->last_name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            @endforeach
    </div>

    <a href="{{ route('program.create', $orchestra) }}" class="absolute bottom-12 right-8 md:right-12 border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add a new program</a>
</x-app-layout>
