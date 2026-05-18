<div>
    <a href="/orchestras" class="flex gap-2 p-2 rounded-lg hover:bg-[#F2F2F2] transition mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" height="1.25rem" viewBox="0 -960 960 960" width="1.25rem" fill="#000000">
            <path d="M264-216h96v-240h240v240h96v-348L480-726 264-564v348Zm-72 72v-456l288-216 288 216v456H528v-240h-96v240H192Zm288-327Z" /></svg>
        <p>Home</p>
    </a>
    <div class="flex-1 h-px bg-[#F2F2F2]"></div>

    <div>
        @foreach($orchestras as $orchestra)

        <a href="{{ route('orchestras.show', $orchestra) }}" class="block w-full p-2 rounded-lg hover:bg-[#F2F2F2] transition mt-2">
            <p class="truncate">
                {{ $orchestra->name }}
            </p>
        </a>

        <div class="ml-4">

            @foreach($orchestra->programs as $program)

            <a href="{{ route('programs.show', ['orchestra' => $orchestra, 'program' => $program]) }}" class="block w-full p-2 rounded-lg hover:bg-[#F2F2F2] transition">
                <p class="truncate">
                    {{ $program->name }}
                </p>
            </a>

            <div class="ml-4">
                @foreach($program->events as $event)
                <a href="{{ route('events.show', ['orchestra' => $orchestra, 'program' => $program, 'event' => $event]) }}" class="block w-full p-2 rounded-lg hover:bg-[#F2F2F2] transition">
                    <p class="truncate">
                        {{ $event->name }} -
                        {{ $event->start_date->format('H:i F j, Y') }}
                    </p>

                    <p class="text-[#737373] truncate">
                        {{ \Illuminate\Support\Str::ucfirst($event->type) }}
                    </p>
                </a>
                @endforeach
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
