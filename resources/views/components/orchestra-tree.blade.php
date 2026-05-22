<div class="flex flex-col h-full min-h-0 hidden lg:flex" :class="{ '!flex': sidebarOpen }">

    <a href="/orchestras" class="flex gap-2 p-2 rounded-lg hover:bg-[#F2F2F2] transition mb-2">
        <svg xmlns="http://www.w3.org/2000/svg" height="1.25rem" viewBox="0 -960 960 960" width="1.25rem" fill="#000000">
            <path d="M264-216h96v-240h240v240h96v-348L480-726 264-564v348Zm-72 72v-456l288-216 288 216v456H528v-240h-96v240H192Zm288-327Z" /></svg>
        <p>Home</p>
    </a>
    <div class="h-px bg-[#F2F2F2]"></div>

    <div class="flex-1 overflow-y-auto min-h-0">
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

    <div class="border-t border-[#F2F2F2] pt-2 mt-2 mb-4 shrink-0">
        <a href="{{ route('profile.edit') }}" class="flex gap-2 items-center p-2 rounded-lg hover:bg-[#F2F2F2] transition">
            <svg xmlns="http://www.w3.org/2000/svg" height="1.25rem" viewBox="0 -960 960 960" width="1.25rem" fill="currentColor">
                <path d="M237-285q54-38 115.5-56.5T480-360q66 0 127.5 18.5T723-285q35-41 52-91t17-104q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 54 17 104t52 91Zm141-165q-42-42-42-102t42-102q42-42 102-42t102 42q42 42 42 102t-42 102q-42 42-102 42t-102-42ZM480-96q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm100-88.5q48-16.5 90-48.5-43-27-91-41t-99-14q-51 0-99.5 13.5T290-233q42 32 90 48.5T480-168q52 0 100-16.5ZM531-501q21-21 21-51t-21-51q-21-21-51-21t-51 21q-21 21-21 51t21 51q21 21 51 21t51-21Zm-51-51Zm0 319Z" />
            </svg>
            <p>{{ __('Profile') }}</p>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex gap-2 items-center w-full p-2 rounded-lg hover:bg-[#F2F2F2] transition">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.25rem" viewBox="0 -960 960 960" width="1.25rem" fill="currentColor">
                    <path d="M216-144q-29.7 0-50.85-21.15Q144-186.3 144-216v-528q0-29.7 21.15-50.85Q186.3-816 216-816h264v72H216v528h264v72H216Zm432-168-51-51 81-81H384v-72h294l-81-81 51-51 168 168-168 168Z" />
                </svg>
                <p>{{ __('Log Out') }}</p>
            </button>
        </form>
    </div>
</div>
