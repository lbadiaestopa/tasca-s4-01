<x-app-layout>
    <div class="flex min-h-screen gap-6">
        <aside class="w-80 mt-4 ml-4">
            <x-orchestra-tree :orchestras="$orchestras" />
        </aside>

        <div class="flex flex-col w-full mx-4">
            <div class="flex mt-6 justify-between">
                <h1 class="font-semibold text-2xl">{{ $orchestra->name }}</h1>

                <div class="flex gap-2">
                    <a href="{{ route('orchestras.edit', $orchestra) }}" class="px-4 py-1 border rounded-xl">Edit</a>

                    <form action="{{ route('orchestras.destroy', $orchestra) }}" method="POST" class="px-4 py-1 border rounded-xl">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="flex gap-2">
                <p>{{ $orchestra->venue }}</p>

                <p>·</p>

                <p>{{ $orchestra->city }}</p>
            </div>

            <h2 class="mt-6 text-xl">Next programs</h2>

            @foreach ($orchestra->programs as $program)
            <a href="{{ route('programs.show', [$orchestra, $program]) }}">
                <div class="py-3 mt-2 border border-[#D9D9D9] rounded-2xl">
                    <div class="flex mx-4 justify-between">
                        <h3 class="font-semibold">{{ $program->name }}</h3>

                        <div class="flex">
                            <p>
                                {{ $program->start_date->format('F j') }}
                                – {{ $program->end_date->format('j, Y') }}
                            </p>
                        </div>

                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>


    <a href="{{ route('program.create', $orchestra) }}" class="absolute bottom-12 right-8 md:right-12 border border-[#D9D9D9] bg-white shadow-md rounded-2xl px-6 py-3 hover:scale-110 transition-transform duration-200">+ Add a new program</a>
</x-app-layout>
