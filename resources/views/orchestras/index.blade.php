<x-app-layout>
    <a href="create-orchestra" class="absolute bottom-12 right-16 border border-black bg-black text-white px-4 py-2">+ Add an orchestra</a>

    <div class="flex flex-col">
        @foreach($orchestras as $orchestra)
        <a href="{{ route('orchestras.show', $orchestra) }}">
            {{ $orchestra->name }}
        </a>
        @endforeach
    </div>
</x-app-layout>
