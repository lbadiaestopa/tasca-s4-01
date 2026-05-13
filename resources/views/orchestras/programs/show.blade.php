<x-app-layout>
    <div class="flex gap-8">
        <h3>{{ $program->name }}</h3>

        <p>{{ $program->start_date }}</p>

        <p>{{ $program->end_date }}</p>
    </div>

    <a href="{{ route('event.create', [$orchestra, $program]) }}" class="absolute bottom-12 right-16 border border-black bg-black text-white px-4 py-2">+ Add an event</a>
</x-app-layout>
