<x-app-layout>
<div class="flex min-h-screen gap-6">
        <aside class="w-80 mt-4 ml-8">
            <x-orchestra-tree :orchestras="$orchestras" />
        </aside>

    <div class="flex mt-6 justify-between">
        <h1 class="font-semibold text-2xl">{{ $orchestra->name }}</h1>

        <a href="{{ route('orchestras.edit', $orchestra) }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" /></svg>
        </a>
    </div>

    <div class="flex-1 h-px bg-black"></div>

    <h2 class="mt-6">Next programs</h2>

    @foreach ($orchestra->programs as $program)
    <a href="{{ route('programs.show', [$orchestra, $program]) }}">
        <div class="py-3 mt-4 border border-[#D9D9D9] rounded-2xl">
            <div class="flex gap-8 ms-6">
                <h3 class="font-semibold">{{ $program->name }}</h3>

                <p>{{ $program->start_date }}</p>

                <p>{{ $program->end_date }}</p>
            </div>
        </div>
    </a>
    @endforeach
    </div>

    <a href="{{ route('program.create', $orchestra) }}" class="absolute bottom-12 right-8 md:right-12 border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add a new program</a>
</x-app-layout>
