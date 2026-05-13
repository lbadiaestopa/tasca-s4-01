<x-app-layout>

    <h2>Programs</h2>

    @foreach ($orchestra->programs as $program)
    <div>
        <h3>{{ $program->name }}</h3>

        <p>{{ $program->start_date }}</p>

        <p>{{ $program->end_date }}</p>
    </div>
    @endforeach
</x-app-layout>
