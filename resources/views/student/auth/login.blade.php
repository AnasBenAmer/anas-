<script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</script>
<x-student-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="text-4xl font-bold text-center">Student Login</div>
    <form method="POST" action="{{ route('student.login') }}">
        @csrf
        <div class="my-3  ">
            <h2 class="text-xl text-black font-semibold   font-serif antialiased">Sign in Your Account </h2>
        </div>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" class="  !font-serif !text-black !text-lg !mb-2" />
            <x-text-input id="email" class="block mt-1 w-full !border-gray-400  " type="email" name="email"
                :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 " />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="  !font-serif !text-black !text-lg !mb-2" />

            <x-text-input id="password" class="block mt-1 w-full !border-gray-400" type="password" name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex justify-between items-center ">
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>

            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-blue-700 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('student.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </div>
        <div class="center mt-4">
            <x-primary-button
                class="rounded-lg w-[98%]  !bg-[rgb(235,157,62)] !py-3  hover:bg-[rgb(238,150,42)] !font-bold focus:ring  !text-center">
                {{ __('llogin') }}
            </x-primary-button>
        </div>
        <div class="flex mt-5">
            <p class="text-gray-500 text-sm font font-medium  "> Don’t have an account yet?</p>
            <p class="text-blue-500 font-medium  text-sm"> <a href="{{ route('student.register') }}"> Signup</a></p>
        </div>
    </form>
</x-student-guest-layout>
