<x-app-layout>
    <div class="flex min-h-screen gap-6">

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

                <div class="flex flex-col justify-center">
                    <div class="flex flex-col mb-2 px-2 rounded-lg">
                        <a href="{{ route('events.edit', [$event->program->orchestra, $event->program, $event]) }}">Edit</a>
                    </div>

                    <div class="flex flex-col mb-2 px-2 rounded-lg">
                        <a href="" class="text-red-500">Delete</a>
                    </div>
                </div>
            </div>
            @endforeach
        </main>
    </div>

    <a href="create-orchestra" class="absolute bottom-12 right-8 md:right-12 border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add an orchestra</a>
</x-app-layout>
