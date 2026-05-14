<x-app-layout>
    <a href="create-orchestra" class="absolute bottom-12 right-8 md:right-12  border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add an orchestra</a>

    <div class="flex flex-col">
        @foreach($orchestras as $orchestra)
        <a href="{{ route('orchestras.show', $orchestra) }}">
            {{ $orchestra->name }}
        </a>
        @endforeach
    </div>
</x-app-layout>
