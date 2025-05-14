<x-slot name="title">
    {{ __("WikyBook") }} – {{ __("Create Your Account") }}
</x-slot>

<x-slot name="description">
    {{ __("Join our community of book lovers and start your reading journey today!") }}
</x-slot>

<x-slot name="keywords">
    {{ __("wikybook, book summaries, book summary, book, summary, summaries") }}
</x-slot>

<div
    class="min-h-screen bg-gradient-to-b from-white to-primary-50 flex flex-col sm:justify-center items-center py-6 sm:py-0">
    <div
        class="w-full sm:max-w-lg mt-6 px-6 py-8 md:bg-white/90 md:backdrop-blur-md md:border md:border-gray-200 md:shadow-2xl md:rounded-3xl opacity-0 animate-fade-in"
        style="animation-delay: 0.4s;">
        <div class="grid place-items-center">
            <a href="{{ route('home') }}">
                <x-app-logo class="h-12"/>
            </a>
            <h2 class="text-2xl font-bold text-center text-gray-900 mb-6">{{ __("Create Your Account") }}</h2>
        </div>
        <form wire:submit="register" class="space-y-6">
            <div>
                <x-forms.input label="First Name" model="first_name" error="{{ $errors->first('first_name') }}"/>
            </div>

            <div>
                <x-forms.input label="Last Name" model="last_name" error="{{ $errors->first('last_name') }}"/>
            </div>

            <div>
                <x-forms.input label="Email" model="email" type="email" error="{{ $errors->first('email') }}"/>
            </div>

            <div>
                <x-forms.input label="Password" model="password" type="password"
                               error="{{ $errors->first('password') }}"/>
            </div>

            <div>
                <x-forms.input label="Confirm Password" model="password_confirmation" type="password"
                               error="{{ $errors->first('password_confirmation') }}"/>
            </div>

            <div>
                <x-btn-primary text="Register"/>

                <p class="mt-4 text-center text-sm text-gray-600">
                    {{ __("Already have an account?") }}
                    <a href="{{ route('login') }}"
                       class="font-medium text-primary-600 hover:text-primary-500 transition-all duration-300">
                        {{ __("Sign In") }}
                    </a>
            </div>
        </form>
    </div>
</div>
