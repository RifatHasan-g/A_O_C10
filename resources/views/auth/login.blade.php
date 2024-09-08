<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form Container -->
    <form method="POST" action="{{ route('login') }}" style="background-color: #f9f9f9; padding: 30px; border-radius: 15px; box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);">
        @csrf

        <!-- Email Address -->
        <div style="margin-bottom: 15px;">
            <x-input-label for="email" :value="__('Email')" style="font-weight: bold; color: #333;" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="border: 1px solid #ccc; padding: 12px; border-radius: 8px; background-color: #f0f7ff;" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div style="margin-bottom: 15px;">
            <x-input-label for="password" :value="__('Password')" style="font-weight: bold; color: #333;" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" style="border: 1px solid #ccc; padding: 12px; border-radius: 8px; background-color: #f0f7ff;" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Forgot Password and Log In Button -->
        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3" style="background-color: #4CAF50; padding: 10px 30px; border-radius: 8px; color: white; font-weight: bold;">
                {{ __('Log In') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Register Section -->
    <div class="mt-4 text-center">
        <p>Don't have an account?</p>
        <a href="{{ route('register') }}" class="btn" style="background-color: #2196F3; color: white; padding: 3px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">
            {{ __('Register') }}
        </a>
    </div>
</x-guest-layout>
