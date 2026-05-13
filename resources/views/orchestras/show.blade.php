<x-app-layout>
    <div class="flex">
        <h1>{{ $orchestra->name }}</h1>

        <p>{{ $orchestra->city }}</p>

        <p>{{ $orchestra->venue }}</p>

        <a href="{{ route('orchestras.edit', $orchestra) }}">
            Edit
        </a>
    </div>
</x-app-layout>
