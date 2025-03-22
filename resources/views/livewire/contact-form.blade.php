<div>
    @if ($success)
        <div class="rounded-lg bg-green-50 border border-green-200 p-2 md:p-6 mb-6 animate-fade-in">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-green-800">{{__('Message Sent Successfully!')}}</h3>
                    <div class="mt-2 text-green-700">
                        <p>{{__('Thank you for reaching out. We will get back to you as soon as possible.')}}</p>
                    </div>
                    <div class="mt-4">
                        <button type="button" wire:click="$set('success', false)" class="rounded-md bg-green-50 px-4 py-2 text-sm font-medium text-green-800 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2">
                            {{__('Send another message')}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <form wire:submit="submitForm" class="space-y-6 relative @if($success) hidden @endif">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">{{__("Name")}}</label>
                <input type="text" id="name" wire:model="name" class="w-full px-4 py-3 rounded-lg border @error('name') border-red-300 @else border-gray-300 @enderror focus:border-primary-500 focus:ring focus:ring-primary-200 focus:ring-opacity-50 outline-none transition-all duration-300 bg-white/50" placeholder="{{__('Your name')}}">
                @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">{{__("Email")}}</label>
                <input type="email" id="email" wire:model="email" class="w-full px-4 py-3 rounded-lg border @error('email') border-red-300 @else border-gray-300 @enderror focus:border-primary-500 focus:ring focus:ring-primary-200 focus:ring-opacity-50 outline-none transition-all duration-300 bg-white/50" placeholder="{{__('Your email')}}">
                @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">{{__("Subject")}}</label>
            <input type="text" id="subject" wire:model="subject" class="w-full px-4 py-3 rounded-lg border @error('subject') border-red-300 @else border-gray-300 @enderror focus:border-primary-500 focus:ring focus:ring-primary-200 focus:ring-opacity-50 outline-none transition-all duration-300 bg-white/50" placeholder="{{__('Message subject')}}">
            @error('subject') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="message" class="block text-sm font-medium text-gray-700 mb-1">{{__("Message")}}</label>
            <textarea id="message" wire:model="message" rows="6" class="w-full px-4 py-3 rounded-lg border @error('message') border-red-300 @else border-gray-300 @enderror focus:border-primary-500 focus:ring focus:ring-primary-200 focus:ring-opacity-50 outline-none transition-all duration-300 bg-white/50" placeholder="{{__('Your message')}}"></textarea>
            @error('message') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="privacyPolicy" wire:model="privacyPolicy" type="checkbox" class="h-4 w-4 text-primary-600 border-gray-300 rounded focus:ring-primary-500">
            </div>
            <div class="ml-3 text-sm">
                <label for="privacyPolicy" class="font-medium text-gray-700">{{__("I agree to the")}} <a href="#" class="text-primary-600 hover:text-primary-700">{{__("privacy policy")}}</a></label>
                @error('privacyPolicy') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
            </div>
        </div>

        <div>
            <button type="submit" class="inline-flex items-center px-6 py-3 rounded-full bg-primary-600 text-white font-medium transition-all duration-300 lg:hover:bg-primary-700 lg:hover:shadow-lg lg:hover:shadow-primary-500/20">
                <span wire:loading.remove class="flex items-center">
                    {{__("Send Message")}}
                    <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </span>
                <span wire:loading wire:target="submitForm" wire:loading.class="!flex items-center">
                    {{__("Sending...")}}
                    <svg class="animate-spin ml-2 w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </span>
            </button>
        </div>
    </form>
</div>
