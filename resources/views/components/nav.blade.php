<!-- Top Navigation Bar -->
<nav class="bg-white shadow-md">
    <!-- Top Teal Bar -->
    <div class="bg-[#00BFB3] text-white">
        <div class="container mx-auto px-4">
            <!-- Top Bar Content -->
            <div class="hidden lg:flex justify-between items-center py-1">
                <!-- Left Links -->
                <div class="flex space-x-6">
                    <a href="{{ route('blogs.list') }}" class="hover:text-gray-200 text-sm font-semibold">BLOG</a>
                    <a href="#" class="hover:text-gray-200 text-sm font-semibold">GUIDES</a>
                    <a href="#" class="hover:text-gray-200 text-sm font-semibold">PROMOTIONS</a>
                    <a href="#" class="hover:text-gray-200 text-sm font-semibold">ABOUT US</a>
                    <a href="#" class="hover:text-gray-200 text-sm font-semibold">CONTACT</a>
                </div>
                <!-- Right Section -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex justify-center items-center gap-2">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M20 5L4.672 11.373c-.395.164-.592.247-.643.354a.3.3 0 0 0 .016.29c.063.1.268.16.68.281L10.5 14M20 5l-2.065 13.049c-.04.254-.06.381-.127.45a.3.3 0 0 1-.223.097c-.097 0-.205-.072-.421-.216l-2.93-1.956M20 5l-9.5 9m0 0l.156 4.3c0 .334 0 .501.069.585c.06.074.15.116.246.115c.11-.001.24-.108.5-.32l2.764-2.256M10.5 14l3.735 2.424" />
                                </svg>
                            </span>
                        </div>
                        <span class="mx-2">|</span>
                        <div class="flex justify-center items-center gap-2">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M6.5 10v4h3v7h4v-7h3l1-4h-4V8c0-.545.455-1 1-1h3V3h-3c-2.723 0-5 2.277-5 5v2z" />
                                </svg>
                            </span>
                        </div>
                        <span class="mx-2">|</span>
                        <div class="flex justify-center items-center gap-2">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                                        <path d="M15.462 11.487a3.5 3.5 0 1 1-6.925 1.026a3.5 3.5 0 0 1 6.925-1.026M17 6.5h.5" />
                                        <path d="M3 9.4c0-2.24 0-3.36.436-4.216a4 4 0 0 1 1.748-1.748C6.04 3 7.16 3 9.4 3h5.2c2.24 0 3.36 0 4.216.436a4 4 0 0 1 1.748 1.748C21 6.04 21 7.16 21 9.4v5.2c0 2.24 0 3.36-.436 4.216a4 4 0 0 1-1.748 1.748C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.436a4 4 0 0 1-1.748-1.748C3 17.96 3 16.84 3 14.6z" />
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
                <img src="{{asset('wiky.png')}}" alt="Wiky Book" class="h-12">
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-6">
                <a href="{{route('books.home')}}" class="text-gray-700 hover:text-[#00BFB3]">Books</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">Authers</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">Collections</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">Genres</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">Quotes</a>
            </div>

            <!-- User and Cart Icons -->
            <div class="hidden lg:flex items-center space-x-4">
                <a href="#" class="text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                            <path d="M14.5 9.1a2.5 2.5 0 1 1-5 0a2.5 2.5 0 0 1 5 0" />
                            <path d="M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0" />
                            <path d="M17 19.2c-.317-6.187-9.683-6.187-10 0" />
                        </g>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden pb-4">
            <div class="flex flex-col space-y-3">
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">DOMAIN NAME</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">WEB HOSTING</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">CLOUD MOROCCO</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">NINDOBUILDER</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">EMAIL</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">SERVERS</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">MANAGED SERVICES</a>
                <a href="#" class="text-gray-700 hover:text-[#00BFB3]">SSL</a>
                <div class="pt-4 border-t border-gray-200">
                    <a href="{{ route('blogs.list') }}" class="block text-gray-700 hover:text-[#00BFB3]">BLOG</a>
                    <a href="#" class="block text-gray-700 hover:text-[#00BFB3] mt-3">GUIDES</a>
                    <a href="#" class="block text-gray-700 hover:text-[#00BFB3] mt-3">PROMOTIONS</a>
                    <a href="#" class="block text-gray-700 hover:text-[#00BFB3] mt-3">ABOUT US</a>
                    <a href="#" class="block text-gray-700 hover:text-[#00BFB3] mt-3">CONTACT</a>
                    <a href="#" class="block text-gray-700 hover:text-[#00BFB3] mt-3">REQUEST A QUOTE</a>
                </div>
            </div>
        </div>
    </div>
</nav>
