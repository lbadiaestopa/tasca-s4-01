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
                <h1 class="font-semibold text-2xl">{{ $event->name }}</h1>

                @if(auth()->user()->memberships()->where('role', 'admin')->exists())
                <div class="flex gap-2">
                    <a href="{{ route('events.edit', [$orchestra, $program, $event]) }}" class="px-4 py-1 border rounded-xl">Edit</a>

                    <form action="{{ route('events.destroy', [$orchestra, $program, $event]) }}" method="POST" class="px-4 py-1 border rounded-xl">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">
                            Delete
                        </button>
                    </form>
                </div>
                @endif
            </div>
            
            <div class="flex gap-8">
                <p>
                    {{ $event->start_date->format('H:i') }}
                    – {{ $event->end_date->format('H:i') }}
                    · {{ $event->start_date->format('F j, Y') }}
                </p>
            </div>
</x-app-layout>
