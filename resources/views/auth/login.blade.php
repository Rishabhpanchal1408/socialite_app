<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <div class="flex items-center">
                <div>
                    <a class="btn" href="{{ route('auth.github') }}">
                        <img src="https://assets-global.website-files.com/5c2a9a234fdbba7439c48fa4/632cc3bd828e07fe6d5755d0_Screen%20Shot%202022-09-22%20at%204.13.06%20PM.jpg"
                            alt="SignIn with Github" style="height: 85px;">
                    </a>
                </div>
                <div>
                    <a href="{{ route('auth.google') }}">
                        <img src="https://onymos.com/wp-content/uploads/2020/10/google-signin-button-1024x260.png"
                            alt="SignIn With Google" style="height: 50px;">
                    </a>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
