<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="h-5 w-5 border-[#D9D9D9] text-[#1B1A1A] focus:ring-0" name="remember">
                <span class="ms-2 text-sm text-[#737373]">{{ __('Remember me') }}</span>
            </label>
        </div>

        <x-primary-button>
            {{ __('Log In') }}
        </x-primary-button>

        <a href="{{ route('register') }}">
            <x-secondary-button>
                {{ __('I don’t have an account. Sign Up') }}
            </x-secondary-button>
        </a>

        <div class="flex items-center justify-center mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-[#737373] hover:text-[#1B1A1A] rounded-m" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
        </div>
    </form>
</x-guest-layout>
