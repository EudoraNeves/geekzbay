@extends('layouts.template')
@section('title', 'Log In')
@section('css')
    <link rel="stylesheet" href="/css/auth/login.css">
@endsection
@section('main')
    <x-guest-layout>
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            @if (isset($loginRequiredMsg) && $loginRequiredMsg)
                <div>{{ $loginRequiredMsg }}</div>
            @endif
            @if ($isNewRegister)
                <div>Verification request sent, please check email and verify!</div>
            @else
                {{-- @if (Session::get('loginRequiredMsg') != null)
                    <div class="loginRequiredMsg">
                        {{ Session::get('loginRequiredMsg') }}
                    </div>
                @endif --}}
                {{-- @if ($loginRequiredMsg)
                    <div class="loginRequiredMsg">
                        {{ $loginRequiredMsg }}
                    </div>
                @endif --}}

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                            autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Not yet registered?') }}
                    </a>

                        <x-primary-button class="ml-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                    <div class="discord-login">
                        Log in with: <a href="{{ route('discord') }}"><img class="discord-icon"
                                src="https://www.svgrepo.com/show/353655/discord-icon.svg"
                                alt="" srcset=""></a>
                    </div>
                </form>
            @endif
        </x-auth-card>
    </x-guest-layout>
@endsection
