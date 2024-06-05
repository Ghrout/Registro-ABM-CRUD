<x-guest-layout>
    <x-authentication-card>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>
                @else
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            style="display: inline-block; padding: 0.75rem 1.5rem; background: linear-gradient(to right, #0805af, #7700ff); color: white; font-weight: 600; border-radius: 9999px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease-in-out;"
                            onmouseover="this.style.transform='scale(1.05)';"
                            onmouseout="this.style.transform='scale(1)';">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <x-slot name="logo">
            {{-- <x-aplication-logo class="w-auto m-1 p-1"></x-aplication-logo> --}}
        </x-slot>

        <div class="max-w-4xl relative flex flex-col p-6 border-2 border-gray-300 rounded-md text-black"
            style="background: #111827">
            <div class="flex justify-center items-center mb-4 relative"
                style="width: 200px; height: 200px; margin: 0 auto;">
                <img src="{{ asset('image/usuario.png') }}" alt="StockPilot" width="120" height="120"
                    class="image_class">
                <div class="box_login_class"></div>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-white text-sm mb-2" for="email">
                        {{ __('User') }}
                    </label>
                    <x-input id="email"
                        class="text-md block px-3 py-2 rounded-lg w-full
                            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                            focus:placeholder-gray-500
                            focus:bg-white
                            focus:border-gray-600
                            focus:outline-none"
                        type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="py-2 mt-4" x-data="{ showPassword: true }">
                    <span class="block text-white text-sm mb-2">{{ __('Password') }}</span>
                    <div class="relative">
                        <input placeholder="" :type="showPassword ? 'password' : 'text'" name="password" required
                            autocomplete="current-password"
                            class="text-md block px-3 py-2 rounded-lg w-full
                                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                                focus:placeholder-gray-500
                                focus:bg-white
                                focus:border-gray-600
                                focus:outline-none">

                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg class="h-6 text-gray-700" fill="none" @click="showPassword = !showPassword"
                                :class="{ 'hidden': !showPassword, 'block': showPassword }"
                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                <!-- Path data -->
                            </svg>

                            <svg class="h-6 text-gray-700" fill="none" @click="showPassword = !showPassword"
                                :class="{ 'block': !showPassword, 'hidden': showPassword }"
                                xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                <!-- Path data -->
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox"
                            class="w-5 h-5 text-blue-600 bg-gray-100 rounded border-gray-500 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-white focus:ring-2 dark:bg-white dark:border-gray-500"
                            id="remember_me" name="remember">
                        <label for="remember_me"
                            class="py-4 ml-3 w-full text-md font-medium text-gray-600 dark:text-gray-500">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                        <label class="block text-gray-500 font-bold my-4">
                            <a href="{{ route('password.request') }}"
                                class="cursor-pointer tracking-tighter text-white border-b-2 border-gray-200 hover:border-blue-600">
                                <span>{{ __('Forgot your password?') }}</span>
                            </a>
                        </label>
                    @endif
                </div>


                <div class="flex items-center justify-center mt-4">
                    <x-button class="m-auto"
                        style="background: linear-gradient(to right, #0805af, #7700ff); color: white; font-weight: 600; padding: 0.75rem 1.5rem; border-radius: 9999px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease-in-out;"
                        onmouseover="this.style.background='linear-gradient(to right, #0805af, #7700ff)'; this.style.transform='scale(1.05)';"
                        onmouseout="this.style.background='linear-gradient(to right, #0805af, #7700ff)'; this.style.transform='scale(1)';">
                        {{ __('Login') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
<style>
    .box_login_class {
        width: 190px;
        height: 190px;
        position: absolute;
        border: 7px solid #ffffff50;
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        background-image: linear-gradient(45deg, #08AEEA3B, #D32AF52D 100%);
        animation: morph_login 8s ease-in-out infinite;
        animation-timing-function: linear;
        z-index: 1;
    }

    .image_class {
        z-index: 2;
        position: relative;
    }

    @keyframes morph_login {
        0% {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }

        50% {
            border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
        }

        100% {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }
    }
</style>
