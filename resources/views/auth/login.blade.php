<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="cols-span-4 flex justify-center mt-6">
        <h2 class="font-semibold text-center">Log In to Vinski</h2>
    </div>

    <div class="flex flex-col gap-4 mt-4">

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-text-input id="email" class="block w-full" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-2">
                <x-text-input id="password" class="block w-full" placeholder="Password" type="password" name="password" required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <x-primary-button class="mt-4 w-full justify-center">
                {{ __('Log In') }}
            </x-primary-button>
        </form>

        <a href="{{ route('register') }}" class="border rounded-2xl w-full py-3 mt-2 text-center">
            {{ __("I don't have an account. Sign Up!") }}
        </a>
    </div>
</x-guest-layout>
