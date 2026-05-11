<x-guest-layout>
    <div class="flex flex-col col-span-4">
        <form method="POST" action="{{ route('create-member-account') }}">
            @csrf

            <x-primary-button>
                {{ __('Create a musician account') }}
            </x-primary-button>
        </form>

        <a href="{{ route('register-orchestra') }}" class="border border-black w-full mt-2 py-2 text-center">
            {{ __('Create an administrator account') }}
        </a>
    </div>
</x-guest-layout>
