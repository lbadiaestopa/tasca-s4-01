<x-app-layout>
    <div class="flex gap-8">
        <h3>{{ $program->name }}</h3>

        <p>{{ $program->start_date }}</p>

        <p>{{ $program->end_date }}</p>

        <a href="{{ route('programs.edit', [$orchestra, $program]) }}">
            Edit
        </a>
    </div>

    <h2>Programs</h2>

    @foreach ($program->events as $event)
    <a href="{{ route('events.show', [$orchestra, $program, $event]) }}">
        <div class="border border-black">
            <h3>{{ $event->name }}</h3>

            <p>{{ $event->type }}</p>

            <p>{{ $event->start_date }}</p>

            <p>{{ $event->end_date }}</p>
        </div>
    </a>
    @endforeach

    <a href="{{ route('event.create', [$orchestra, $program]) }}" class="absolute bottom-12 right-16 border border-black bg-black text-white px-4 py-2">+ Add an event</a>
</x-app-layout>
