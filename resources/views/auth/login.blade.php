<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col md:justify-center items-center pt-6 md:pt-0 bg-gray-100 dark:bg-gray-900 md:flex-row md:items-center md:justify-center md:gap-12">

        <!-- logo-->
        <x-application-logo class="w-20 h-20 fill-current text-center text-gray-500 md:w-64 md:h-64" />
        <div class="bg-gray dark:bg-gray-800 rounded-md w-72 h-96 mt-3 p-3 md:w-96 md:p-3">
            <form method="POST" action="{{ route('login') }}" class="mt-5">
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
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-md focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-md text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>
                <x-primary-button class="w-full flex  justify-center mt-3">
                    {{ __('Log in') }}
                </x-primary-button>
                <a href="{{route('register')}}">
                    <div class="w-full border flex items-center justify-center text-white rounded-md mt-5 h-10">Create new Account</div>
                </a></button>
        </div>
        </form>
    </div>

    </div>
</body>

</html>