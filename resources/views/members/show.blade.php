<x-app-layout>
    <div class="flex min-h-screen gap-6">
        <aside class="w-80 mt-4 ml-4">
            <x-orchestra-tree :orchestras="$orchestras" />
        </aside>

        <div class="flex flex-col w-full mx-4">
            <div class="flex flex-col mt-6 justify-between">
                <h1 class="font-semibold text-2xl">{{ $membership->user->name }} {{ $membership->user->last_name }}</h1>

                <div class="flex gap-8">
                    <p>
                        {{ str($membership->section)->replace('_', ' ')->title() }}
                        – {{ $membership->instrument }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>