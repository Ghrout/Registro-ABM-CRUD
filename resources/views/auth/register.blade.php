<x-guest-layout>
    <x-authentication-card>
        @if (Route::has('register'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        style="display: inline-block; padding: 0.75rem 1.5rem; background: linear-gradient(to right, #0805af, #7700ff); color: white; font-weight: 600; border-radius: 9999px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease-in-out;"
                        onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">
                        Log in
                    </a>
                @endauth
            </div>
        @endif
        <x-slot name="logo">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <div class="max-w-4xl relative flex flex-col p-6 border-2 border-gray-300 rounded-md text-black"
            style="background: #111827">
            <div class="flex justify-center items-center mb-4 relative"
                style="width: 200px; height: 200px; margin: 0 auto;">
                <img src="{{ asset('image/register.png') }}" alt="StockPilot" width="120" height="120"
                    class="image_class">
                <div class="box_login_class"></div>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <label for="name" class="block text-white text-sm mb-2">{{ __('Name') }}</label>
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-label class="block text-white text-sm mb-2" for="email">{{ __('Email') }}</x-label>
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label class="block text-white text-sm mb-2" for="password">{{ __('Password') }}</x-label>
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label class="block text-white text-sm mb-2"
                        for="password_confirmation">{{ __('Confirm Password') }}</x-label>
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />

                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                <div class="flex items-center justify-center mt-4 space-x-4">
                    <div class="ml-2">
                        <a class="cursor-pointer tracking-tighter text-white border-b-2 border-gray-200 hover:border-blue-600"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>

                    <div class="ml-2">
                        <x-button class="m-auto"
                            style="background: linear-gradient(to right, #0805af, #7700ff); color: white; font-weight: 600; padding: 0.75rem 1.5rem; border-radius: 9999px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease-in-out;"
                            onmouseover="this.style.background='linear-gradient(to right, #0805af, #7700ff)'; this.style.transform='scale(1.05)';"
                            onmouseout="this.style.background='linear-gradient(to right, #0805af, #7700ff)'; this.style.transform='scale(1)';">
                            {{ __('Register') }}
                        </x-button>
                    </div>
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
