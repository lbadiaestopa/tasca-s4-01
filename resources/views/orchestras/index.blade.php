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

        <main class="flex-1 mt-8">
            <h1 class="font-semibold text-2xl">Home</h1>

            <h2 class="text-xl mt-4">Next Events</h2>

            <div class="h-2"></div>

            @foreach($events as $event)
            <div class="flex flex-col justify-between">
                <div class="flex-1">
                    <a href="{{ route('events.show', ['orchestra' => $event->program->orchestra, 'program' => $event->program, 'event' => $event]) }}">
                        <div class="bg-[#FAFAFA] border rounded-lg px-4 py-2 mt-2">
                            <div class="flex flex-col md:flex-row justify-between">
                                <h3 class="font-semibold">{{ $event->name }}</h3>
                                <p>{{ \Illuminate\Support\Str::ucfirst($event->type) }}</p>
                            </div>

                            <div class="flex flex-col md:flex-row justify-between">
                                <div class="flex gap-2">
                                    <p class="text-[#737373]">{{ $event->program->name }}</p>
                                    <p class="text-[#737373]">·</p>
                                    <p class="text-[#737373]">{{ $event->program->orchestra->name }}</p>
                                </div>

                                <div class="flex gap-2">
                                    <p class="text-[#737373]">{{ $event->start_date->format('H:i') }} - {{ $event->end_date->format('H:i') }}</p>
                                    <p class="text-[#737373]">·</p>
                                    <p class="text-[#737373]">{{ $event->start_date->format('F j, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
        </main>

        <div>
            <button @click="open = ! open" class="absolute bottom-8 right-8 md:right-12 inline-flex items-center justify-center p-2 rounded-md text-black hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                <svg :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex h-6 w-6" fill="currentColor" viewBox="0 -960 960 960">
                    <path d="M446.67-446.67H200v-66.66h246.67V-760h66.66v246.67H760v66.66H513.33V-200h-66.66v-246.67Z" />
                </svg>

                <svg :class="{'hidden': ! open, 'inline-flex': open }" class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('orchestras')" :active="request()->routeIs('orchestras')">
                    {{ __('Orchestras') }}
                </x-responsive-nav-link>
            </div>
        </div>

        <div class="absolute bottom-24 right-8 md:right-12 flex flex-col items-end gap-4">
            <a x-show="open" x-transition href="{{ route('memberships.create') }}" class="border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">
                + Add member to an orchestra
            </a>

            <a x-show="open" x-transition href="{{ route('members.create') }}" class="border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">
                + Add a member
            </a>

            <a x-show="open" x-transition href="{{ route('orchestras.create') }}" class="border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">
                + Add an orchestra
            </a>
        </div>
    </div>
</x-app-layout>
