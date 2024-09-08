<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" style="background-color: #f9f9f9; padding: 25px; border-radius: 10px; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);">
        @csrf

        <!-- Name -->
        <div style="margin-bottom: 15px;">
            <x-input-label for="name" :value="__('Name')" style="font-weight: bold; color: #333;" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" style="border: 2px solid #ccc; padding: 10px; border-radius: 8px; background-color: #fff;" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div style="margin-bottom: 15px;">
            <x-input-label for="email" :value="__('Email')" style="font-weight: bold; color: #333;" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" style="border: 2px solid #ccc; padding: 10px; border-radius: 8px; background-color: #fff;" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div style="margin-bottom: 15px;">
            <x-input-label for="password" :value="__('Password')" style="font-weight: bold; color: #333;" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" style="border: 2px solid #ccc; padding: 10px; border-radius: 8px; background-color: #fff;" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div style="margin-bottom: 15px;">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" style="font-weight: bold; color: #333;" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" style="border: 2px solid #ccc; padding: 10px; border-radius: 8px; background-color: #fff;" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4" style="background-color: #4CAF50; padding: 10px 20px; border-radius: 8px; color: white; font-weight: bold;">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>




