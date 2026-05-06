<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- PopUp Credentials -->
<div id="popupCred" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden pointer-events-none">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 p-6 transform transition-all mb-16 mt-[10%] ml-[25%] pointer-events-auto">
        <div class="mb-4">


            <p class="text-lg font-bold text-gray-900 mb-2">Attention!</p>
            <p class="text-gray-600">Testin credentials</p>
            <p><br></p>
            <p class="text-gray-600">You can try NiConnect MiniCRM -application using the following test user accounts. The test user has been granted permissions to view the same information as a user with the admin role.</p>
            <p><br></p>
            <p>Email: testadmin@testadmin.com</p>
            <p>Password: testadmin1234</p>
            <p><br></p>
        </div>
        <div class="flex justify-end">
            <button 
                id="close-disc-btn" 
                onclick="closePopupCred()" 
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                OK
            </button>
        </div>
    </div>
</div>
<!-- PopUp Credentials -->

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

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button id="loginButton" class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
