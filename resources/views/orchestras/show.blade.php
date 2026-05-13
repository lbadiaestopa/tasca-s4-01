<x-app-layout>
    <a href="{{ route('program.create', $orchestra) }}" class="absolute bottom-12 right-16 border border-black bg-black text-white px-4 py-2">+ Add a new program</a>

    <div class="flex">
        <h1>{{ $orchestra->name }}</h1>

        <p>{{ $orchestra->city }}</p>

        <p>{{ $orchestra->venue }}</p>

        <a href="{{ route('orchestras.edit', $orchestra) }}">
            Edit
        </a>
    </div>

    <h2>Programs</h2>

    @foreach ($orchestra->programs as $program)
    <a href="{{ route('programs.show', [$orchestra, $program]) }}">
        <div class="border border-black">
            <h3>{{ $program->name }}</h3>

            <p>{{ $program->start_date }}</p>

            <p>{{ $program->end_date }}</p>
        </div>
    </a>
    @endforeach
</x-app-layout>
