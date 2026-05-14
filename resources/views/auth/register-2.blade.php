<x-guest-layout>
    <div class="flex flex-col col-span-4 mt-6">
        <form method="POST" action="{{ route('create-member-account') }}">
            @csrf

            <x-primary-button>
                {{ __('Create a musician account') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('create-admin-account') }}">
            @csrf

            <x-secondary-button class="mt-2">
                {{ __('Create an administrator account') }}
            </x-secondary-button>
        </form>
    </div>
</x-guest-layout>
