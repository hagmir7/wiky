<div class="min-h-screen bg-gradient-to-b from-white to-primary-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white/90 backdrop-blur-md border border-gray-200 shadow-2xl rounded-3xl opacity-0 animate-fade-in" style="animation-delay: 0.4s;">
        <h2 class="text-2xl font-bold text-center text-gray-900 mb-6">{{ __("Sign In to Your Account") }}</h2>
        <form wire:submit.prevent="login" class="space-y-6">
            <div>
                <x-forms.input label="Email" model="email" type="email" error="{{ $errors->first('email') }}"/>
            </div>

            <div>
                <x-forms.input label="Password" model="password" type="password" error="{{ $errors->first('password') }}"/>
            </div>

            <!-- Remember Me and Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input wire:model="remember" id="remember" type="checkbox" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">
                        {{ __("Remember me") }}
                    </label>
                </div>
            </div>

            <div>
                <x-btn-primary text="Sign In" />

                <p class="mt-4 text-center text-sm text-gray-600">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="font-medium text-primary-600 hover:text-primary-500 transition-all duration-300">
                        {{ __("Sign Up") }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
