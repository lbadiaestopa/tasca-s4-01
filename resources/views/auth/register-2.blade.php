<x-guest-layout>
    <div class="flex flex-col col-span-4">
        <form method="POST" action="{{ route('create-member-account') }}">
            @csrf

            <x-primary-button type="submit" class="border border-black w-full py-2 mt-6 text-center">
                {{ __('Create a musician account') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('create-admin-account') }}">
            @csrf

            <x-secondary-button type="submit" class="border border-black w-full py-2 mt-6 text-center">
                {{ __('Create an administrator account') }}
            </x-secondary-button>
        </form>
    </div>
</x-guest-layout>
