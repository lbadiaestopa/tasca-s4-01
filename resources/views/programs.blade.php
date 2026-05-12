<x-app-layout>
    <h2 class="col-span-full text-2xl leading-9 ms-2 mb-2">April</h2>

    <div class="col-span-4 md:col-span-6 md:col-start-2 lg:col-start-4 flex justify-between items-center">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000" class="ms-2">
            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
        </svg>

        @for ($i = 0; $i < 7; $i++) <div class="h-8 w-8 md:h-12 md:w-12 border border-[#1B1A1A] flex items-center justify-center">
            <p class="md:text-2xl leading-9">{{ $i + 1 }}</p>
    </div>
    @endfor


    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000" class="col-span-full me-2">
        <path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z" />
    </svg>
    </div>

    <div class="col-span-full mt-8">
        @for ($i = 0; $i < 12; $i++) <div class="flex mb-2">
            <div class="h-12 w-12 border border-[#B9B9B9] flex items-center justify-center">
                <p class="leading-9">20</p>
            </div>
            <div class="bg-[#F2F2F2] flex items-center justify-center w-full ms-4"></div>
    </div>
    @endfor
    </div>
</x-app-layout>