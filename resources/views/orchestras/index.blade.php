<x-app-layout>
    <div class="relative flex min-h-screen gap-6" x-data="{ open: false }">
        <aside class="w-80 mt-4 ml-4">
            <x-orchestra-tree :orchestras="$orchestras" />
        </aside>

        <main class="flex-1 mt-4 mr-4">
            <h2 class="col-span-full text-xl leading-9 mb-2">Next Events</h2>

            @foreach($events as $event)
            <div class="flex justify-between gap-2">
                <div class="flex-1">
                    <a href="{{ route('events.show', ['orchestra' => $event->program->orchestra, 'program' => $event->program, 'event' => $event]) }}">
                        <div class="mb-2 block p-2 rounded-lg bg-[#FAFAFA]">
                            <div class="flex justify-between">
                                <h3 class="font-semibold">{{ $event->name }}</h3>
                                <p>{{ \Illuminate\Support\Str::ucfirst($event->type) }}</p>

                            </div>
                            <div class="flex justify-between">
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

        <!-- Hamburger -->
        <div>
            <button @click="open = ! open" class="absolute bottom-24 right-8 md:right-12 inline-flex items-center justify-center p-2 rounded-md text-black hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">

                <svg :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex h-6 w-6" fill="currentColor" viewBox="0 -960 960 960">
                    <path d="M446.67-446.67H200v-66.66h246.67V-760h66.66v246.67H760v66.66H513.33V-200h-66.66v-246.67Z" />
                </svg>

                <svg :class="{'hidden': ! open, 'inline-flex': open }" class="hidden h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </button>
        </div>
        
        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('orchestras')" :active="request()->routeIs('orchestras')">
                    {{ __('Orchestras') }}
                </x-responsive-nav-link>
            </div>
        </div>

        <a x-show="open" x-transition href="{{ route('memberships.create') }}" class="absolute bottom-72 right-8 md:right-12 border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add to an existing orchestra</a>
        <a x-show="open" x-transition href="{{ route('members.create') }}" class="absolute bottom-52 right-8 md:right-12 border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add a member</a>
        <a x-show="open" x-transition href="{{ route('orchestras.create') }}" class="absolute bottom-36 right-8 md:right-12 border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add an orchestra</a>
    </div>
</x-app-layout>
