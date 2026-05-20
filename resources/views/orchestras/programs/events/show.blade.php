<x-app-layout>
    <div class="flex min-h-screen gap-6">
        <aside class="w-80 mt-4 ml-4">
            <x-orchestra-tree :orchestras="$orchestras" />
        </aside>

        <div class="flex flex-col w-full mx-4">
            <div class="flex mt-6 justify-between">
                <h1 class="font-semibold text-2xl">{{ $event->name }}</h1>

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
            </div>
            <div class="flex gap-8">
                <p>
                    {{ $event->start_date->format('H:i') }}
                    – {{ $event->end_date->format('H:i') }}
                    · {{ $event->start_date->format('F j, Y') }}
                </p>
            </div>

            <a href="{{ route('event.create', [$orchestra, $program]) }}" class="absolute bottom-12 right-8 md:right-12 border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add an event</a>
</x-app-layout>
