<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="font-semibold text-center mt-6">Log In to +++</h2>

    <form method="POST" action="{{ route('login') }}" class="mt-4">
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

        <x-primary-button class="mt-4">
            {{ __('Log In') }}
        </x-primary-button>

        <div class="flex items-center justify-center mt-6">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-[#737373] hover:text-[#1B1A1A] rounded-m" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
        </div>
    </form>
</x-guest-layout>
