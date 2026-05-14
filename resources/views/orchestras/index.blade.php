<x-app-layout>
    <a href="create-orchestra" class="absolute bottom-12 right-8 md:right-12 border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add an orchestra</a>
    @foreach($orchestras as $orchestra)
    <a href="{{ route('orchestras.show', $orchestra) }}">
        <div class="py-3 px-6 mt-4 border border-[#D9D9D9] rounded-2xl">
            <div class="flex gap-8">
                <h3 class="font-semibold">{{ $orchestra->name }}</h3>
                <p class="text-[#737373]">{{ $orchestra->venue }}</p>
                <p class="text-[#737373]">{{ $orchestra->city }}</p>
            </div>
        </div>
    </a>
    @endforeach
</x-app-layout>
