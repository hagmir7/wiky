<div class="min-h-screen bg-gradient-to-b from-white to-primary-50">
    <div class="container mx-auto px-6 py-12 max-w-6xl">
        @if(session('success'))
            <div class="bg-green-50 border border-green-300 text-green-800 px-4 py-3 rounded-md shadow-sm relative mb-8 opacity-0 animate-fade-in" style="animation-delay: 0.2s;" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __("Profile Information") }}</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ __("Update your account's profile information.") }}</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit="updateProfile">
                    <div class="shadow sm:rounded-md sm:overflow-hidden bg-white/90 backdrop-blur-md border border-gray-200">
                        <div class="px-4 py-5 space-y-6 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-forms.input label="First Name" model="first_name" error="{{ $errors->first('first_name') }}"/>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-forms.input label="Last Name" model="last_name" error="{{ $errors->first('last_name') }}"/>
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <x-forms.input label="Email" model="email" type="email" error="{{ $errors->first('email') }}"/>
                                </div>

                                <div class="col-span-6">
                                    <label class="block text-sm font-medium text-gray-700">{{ __("Profile Photo") }}</label>
                                    <div class="mt-1 flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                            @if(auth()->user()->getFirstMediaUrl('users-avatar'))
                                                <img src="{{ auth()->user()->getFirstMediaUrl('users-avatar') }}" alt="Profile Photo" class="h-full w-full object-cover rounded-full">
                                            @else
                                                <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            @endif
                                        </span>
                                        <x-forms.input model="avatar" type="file" error="{{ $errors->first('avatar') }}"/>
                                    </div>
                                    @error('avatar') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-full text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-300">
                                {{ __("Save") }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __("Change Password") }}</h3>
                        <p class="mt-1 text-sm text-gray-600">{{ __("Ensure your account is using a long, random password to stay secure.") }}</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form wire:submit="changePassword">
                        <div class="shadow overflow-hidden sm:rounded-md bg-white/90 backdrop-blur-md border border-gray-200">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6">
                                        <x-forms.input label="Current Password" model="current_password" type="password" error="{{ $errors->first('current_password') }}"/>
                                    </div>

                                    <div class="col-span-6">
                                        <x-forms.input label="New Password" model="new_password" type="password" error="{{ $errors->first('new_password') }}" />
                                    </div>

                                    <div class="col-span-6">
                                        <x-forms.input label="Confirm New Password" model="new_password_confirmation" type="password" error="{{ $errors->first('new_password') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-full text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-300">
                                    {{ __("Change Password") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="hidden sm:block" aria-hidden="true">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ __("Logout") }}</h3>
                        <p class="mt-1 text-sm text-gray-600">{{ __("Click the button below to logout from your account.") }}</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form wire:submit="logout">
                        <div class="shadow overflow-hidden sm:rounded-md bg-white/90 backdrop-blur-md border border-gray-200">
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-full text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all duration-300">
                                    {{ __("Logout") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
