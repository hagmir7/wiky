<!-- Top Navigation Bar -->
<nav
    x-data="{ showNavbar: true, lastScrollY: window.scrollY, hasScrolled: window.scrollY > 0, mobileMenuOpen: false }"
    x-init="$watch('showNavbar', value => {
         $dispatch('navbar-toggle', { showNavbar: value })
         });
         hasScrolled = window.scrollY > 0;
       "
    @scroll.window="
          showNavbar = window.scrollY <= lastScrollY || window.scrollY < 50;
          lastScrollY = window.scrollY;
          hasScrolled = window.scrollY > 0;
       "
    :class="{
          '-translate-y-full': !showNavbar,
          'translate-y-0': showNavbar
       }"
    class="w-full fixed top-0 left-0 z-[9999] transition delay-100 bg-white shadow-md">
    <!-- Top Teal Bar -->
    <div class="bg-primary-500 text-white">
        <div class="container mx-auto px-4">
            <!-- Top Bar Content -->
            <div class="hidden lg:flex justify-between items-center py-1">
                <!-- Left Links -->
                <div class="flex space-x-6">
                    <x-top-nav-link href="{{ route('blogs.list') }}" :active="request()->is('blogs*')">BLOG
                    </x-top-nav-link>
                    <x-top-nav-link href="#" :active="request()->is('guides*')">GUIDES</x-top-nav-link>
                    <x-top-nav-link href="#" :active="request()->is('promotions*')">PROMOTIONS</x-top-nav-link>
                    <x-top-nav-link href="{{ route('about') }}" :active="request()->is('about*')">ABOUT US</x-top-nav-link>
                    <x-top-nav-link href="#" :active="request()->is('contact*')">CONTACT</x-top-nav-link>
                </div>
                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex justify-center items-center gap-2">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="1.5"
                                          d="M20 5L4.672 11.373c-.395.164-.592.247-.643.354a.3.3 0 0 0 .016.29c.063.1.268.16.68.281L10.5 14M20 5l-2.065 13.049c-.04.254-.06.381-.127.45a.3.3 0 0 1-.223.097c-.097 0-.205-.072-.421-.216l-2.93-1.956M20 5l-9.5 9m0 0l.156 4.3c0 .334 0 .501.069.585c.06.074.15.116.246.115c.11-.001.24-.108.5-.32l2.764-2.256M10.5 14l3.735 2.424"/>
                                </svg>
                            </span>
                        </div>
                        <span class="mx-2">|</span>
                        <div class="flex justify-center items-center gap-2">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="1.5"
                                          d="M6.5 10v4h3v7h4v-7h3l1-4h-4V8c0-.545.455-1 1-1h3V3h-3c-2.723 0-5 2.277-5 5v2z"/>
                                </svg>
                            </span>
                        </div>
                        <span class="mx-2">|</span>
                        <div class="flex justify-center items-center gap-2">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                       stroke-width="1.5">
                                        <path
                                            d="M15.462 11.487a3.5 3.5 0 1 1-6.925 1.026a3.5 3.5 0 0 1 6.925-1.026M17 6.5h.5"/>
                                        <path
                                            d="M3 9.4c0-2.24 0-3.36.436-4.216a4 4 0 0 1 1.748-1.748C6.04 3 7.16 3 9.4 3h5.2c2.24 0 3.36 0 4.216.436a4 4 0 0 1 1.748 1.748C21 6.04 21 7.16 21 9.4v5.2c0 2.24 0 3.36-.436 4.216a4 4 0 0 1-1.748 1.748C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.436a4 4 0 0 1-1.748-1.748C3 17.96 3 16.84 3 14.6z"/>
                                    </g>
                                </svg>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-2">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <img src="{{asset('wiky.png')}}" alt="Wiky Book" class="h-12">
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden" @click="mobileMenuOpen = !mobileMenuOpen">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-6">
                <x-nav-link href="{{ route('books.home') }}" :active="request()->is('books*')">Books</x-nav-link>
                <x-nav-link href="#" :active="request()->is('authors*')">Authors</x-nav-link>
                <x-nav-link href="#" :active="request()->is('collections*')">Collections</x-nav-link>
                <x-nav-link href="#" :active="request()->is('genres*')">Genres</x-nav-link>
                <x-nav-link href="#" :active="request()->is('quotes*')">Quotes</x-nav-link>
            </div>

            <!-- User and Cart Icons -->
            <div class="hidden lg:flex items-center space-x-4">
                <a href="#" class="text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                           stroke-width="1.5">
                            <path d="M14.5 9.1a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0"/>
                            <path d="M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0"/>
                            <path d="M17 19.2c-.317-6.187-9.683-6.187-10 0"/>
                        </g>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div
            x-show="mobileMenuOpen"
            x-cloak
            x-transition:enter="transition ease-in duration-500"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in-out duration-400"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="lg:hidden pb-4 h-screen">
            <div class="flex flex-col space-y-3">
                <x-mobile-nav-link href="#" :active="request()->is('domain-name*')">DOMAIN NAME</x-mobile-nav-link>
                <x-mobile-nav-link href="#" :active="request()->is('web-hosting*')">WEB HOSTING</x-mobile-nav-link>
                <x-mobile-nav-link href="#" :active="request()->is('cloud-morocco*')">CLOUD MOROCCO</x-mobile-nav-link>
                <x-mobile-nav-link href="#" :active="request()->is('nindobuilder*')">NINDOBUILDER</x-mobile-nav-link>
                <x-mobile-nav-link href="#" :active="request()->is('email*')">EMAIL</x-mobile-nav-link>
                <x-mobile-nav-link href="#" :active="request()->is('servers*')">SERVERS</x-mobile-nav-link>
                <x-mobile-nav-link href="#" :active="request()->is('managed-services*')">MANAGED SERVICES
                </x-mobile-nav-link>
                <x-mobile-nav-link href="#" :active="request()->is('ssl*')">SSL</x-mobile-nav-link>

                <div class="pt-4 border-t border-gray-200">
                    <x-mobile-nav-link href="{{ route('blogs.list') }}" :active="request()->is('blogs*')" class="block">
                        BLOG
                    </x-mobile-nav-link>
                    <x-mobile-nav-link href="#" :active="request()->is('guides*')" class="block mt-3">GUIDES
                    </x-mobile-nav-link>
                    <x-mobile-nav-link href="#" :active="request()->is('promotions*')" class="block mt-3">PROMOTIONS
                    </x-mobile-nav-link>
                    <x-mobile-nav-link href="{{ route('about') }}" :active="request()->is('about*')" class="block mt-3">ABOUT US
                    </x-mobile-nav-link>
                    <x-mobile-nav-link href="#" :active="request()->is('contact*')" class="block mt-3">CONTACT
                    </x-mobile-nav-link>
                    <x-mobile-nav-link href="#" :active="request()->is('quote*')" class="block mt-3">REQUEST A QUOTE
                    </x-mobile-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
