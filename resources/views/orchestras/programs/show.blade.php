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
                <h1 class="font-semibold text-2xl">{{ $program->name }}</h1>

                <div class="flex gap-2">
                    <a href="{{ route('programs.edit', [$orchestra, $program]) }}" class="px-4 py-1 border rounded-xl max-h-9">Edit</a>

                    <form action="{{ route('programs.destroy', [$orchestra, $program]) }}" method="POST" class="px-4 py-1 border rounded-xl  max-h-9">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="flex gap-8">
                <p>
                    {{ $program->start_date->format('F j') }}
                    – {{ $program->end_date->format('j, Y') }}
                </p>
            </div>

            <h2 class="mt-6 text-xl">Next events</h2>

            @foreach ($program->events as $event)
            <a href="{{ route('events.show', [$orchestra, $program, $event]) }}">
                <div class="bg-[#FAFAFA] border rounded-lg py-2 mt-2">
                    <div class="flex mx-4 flex-col md:flex-row justify-between">
                        <div>
                            <h3 class="font-semibold">{{ $event->name }}</h3>

                            <p>{{ \Illuminate\Support\Str::ucfirst($event->type) }}</p>
                        </div>

                        <p class="text-[#737373]">
                            {{ $event->start_date->format('H:i') }}
                            – {{ $event->end_date->format('H:i · F j, Y') }}
                        </p>
                    </div>
                </div>
            </a>
            @endforeach

            <a href="{{ route('event.create', [$orchestra, $program]) }}" class="absolute bottom-12 right-8 md:right-12 border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add an event</a>
</x-app-layout>
