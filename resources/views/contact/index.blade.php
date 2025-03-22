@extends('layout.base')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-white to-primary-50">
        <div class="container mx-auto px-6 pt-24 max-w-6xl overflow-hidden">
            <header class="text-center mb-16 opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                <div class="inline-block mb-3">
                    <span class="px-3 py-1 text-sm font-medium rounded-full bg-primary-100 text-primary-800 border border-primary-200">
                        {{__("Get in Touch")}}
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-primary-950 via-primary-800 to-primary-700 bg-clip-text text-transparent">
                    {{__("Contact Us")}}
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    {{__("We'd love to hear from you. Reach out with questions, feedback, or partnership opportunities.")}}
                </p>
            </header>

            <div class="grid lg:grid-cols-2 justify-center gap-10">
                <!-- Contact Information Column -->
                <div class="space-y-10 opacity-0 animate-slide-right" style="animation-delay: 0.4s;">
                    <div class="bg-white/70 backdrop-blur-md border border-white/30 shadow-lg rounded-2xl p-3 md:p-8 relative overflow-hidden">
                        <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-gradient-to-br from-primary-200 to-primary-400 rounded-full opacity-20 blur-3xl"></div>
                        <h3 class="text-2xl font-bold text-primary-950 mb-6 relative">{{__('Connect With Us')}}</h3>
                        <div class="space-y-6 relative">
                            <div class="flex items-start">
                                <div
                                    class="relative flex h-12 w-12 items-center justify-center rounded-xl bg-primary-100 text-primary-600 transition-all duration-300 ease-in-out me-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-primary-950 mb-1">{{__("Email")}}</h4>
                                    <p class="text-gray-600"><a href="mailto:support@wikybook.com">support@wikybook.com</a></p>
                                    <p class="text-gray-500 text-sm mt-1">{{__("We aim to respond within 24 hours")}}</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="relative flex h-12 w-12 items-center justify-center rounded-xl bg-primary-100 text-primary-600 transition-all duration-300 ease-in-out me-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-primary-950 mb-1">{{__("Phone")}}</h4>
                                    <p class="text-gray-600"><a href="tel:+212612345678">+212 612345678</a></p>
                                    <p class="text-gray-500 text-sm mt-1">{{__("Mon-Fri, 9AM-5PM EST")}}</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div
                                    class="relative flex h-12 w-12 items-center justify-center rounded-xl bg-primary-100 text-primary-600 transition-all duration-300 ease-in-out me-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-primary-950 mb-1">{{__("Address")}}</h4>
                                    <p class="text-gray-600">{{__("Fes, Nador")}}</p>
                                    <p class="text-gray-600">{{__("Morocco")}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h4 class="text-lg font-semibold text-primary-950 mb-4">{{__("Follow Us")}}</h4>
                            <div class="flex space-x-4">
                                <a href="https://t.me/wikybook" target="_black"
                                   class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 transition-all duration-500 lg:hover:bg-primary-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="1.5"
                                              d="M20 5L4.672 11.373c-.395.164-.592.247-.643.354a.3.3 0 0 0 .016.29c.063.1.268.16.68.281L10.5 14M20 5l-2.065 13.049c-.04.254-.06.381-.127.45a.3.3 0 0 1-.223.097c-.097 0-.205-.072-.421-.216l-2.93-1.956M20 5l-9.5 9m0 0l.156 4.3c0 .334 0 .501.069.585c.06.074.15.116.246.115c.11-.001.24-.108.5-.32l2.764-2.256M10.5 14l3.735 2.424"/>
                                    </svg>
                                </a>
                                <a href="https://pinterest.com/wikybook" target="_black"
                                   class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 transition-all duration-500 lg:hover:bg-primary-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                           stroke-linejoin="round" stroke-width="1.5">
                                            <path
                                                d="M7.452 13.18c-1.108-2.262.4-6.668 5.472-5.948c5.587.794 4.581 9.478-.077 9.138c-1.474-.107-2.031-1.328-2.177-2.576m0 0c-.11-.946.017-1.907.16-2.41c.244-.857.649-.74.353.393c-.144.552-.32 1.245-.513 2.017m0 0a652 652 0 0 0-1.63 6.708"/>
                                            <path d="M21 12a9 9 0 1 1-18 0a9 9 0 0 1 18 0"/>
                                        </g>
                                    </svg>
                                </a>
                                <a href="https://instagram.com/wikybook" target="_black"
                                   class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 transition-all duration-500 lg:hover:bg-primary-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                           stroke-linejoin="round" stroke-width="1.5">
                                            <path
                                                d="M15.462 11.487a3.5 3.5 0 1 1-6.925 1.026a3.5 3.5 0 0 1 6.925-1.026M17 6.5h.5"/>
                                            <path
                                                d="M3 9.4c0-2.24 0-3.36.436-4.216a4 4 0 0 1 1.748-1.748C6.04 3 7.16 3 9.4 3h5.2c2.24 0 3.36 0 4.216.436a4 4 0 0 1 1.748 1.748C21 6.04 21 7.16 21 9.4v5.2c0 2.24 0 3.36-.436 4.216a4 4 0 0 1-1.748 1.748C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.436a4 4 0 0 1-1.748-1.748C3 17.96 3 16.84 3 14.6z"/>
                                        </g>
                                    </svg>
                                </a>
                                <a href="https://facebook.com/wikybook" target="_black"
                                   class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 transition-all duration-500 lg:hover:bg-primary-600 hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="1.5"
                                              d="M6.5 10v4h3v7h4v-7h3l1-4h-4V8c0-.545.455-1 1-1h3V3h-3c-2.723 0-5 2.277-5 5v2z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-10 opacity-0 animate-slide-left" style="animation-delay: 0.4s;">
                    <div class="lg:col-span-2 bg-white/70 backdrop-blur-md border border-white/30 shadow-sm border-gray-400 rounded-2xl p-3 md:p-8 relative overflow-hidden">
                        <div
                            class="absolute -top-20 -left-20 w-64 h-64 bg-gradient-to-br from-primary-100 to-primary-300 rounded-full opacity-20 blur-3xl"></div>

                        <h3 class="text-4xl lg:text-7xl font-bold mobile-text-outline lg:desktop-text-outline mb-6 relative">{{__('FAQs')}}</h3>

                        <div class="space-y-7 relative">
                            <div class="border-b border-gray-200 pb-4">
                                <h4 class="text-lg lg:text-xl font-semibold text-primary-950 mb-2">{{__("How do I create an account?")}}</h4>
                                <p class="lg:text-lg text-gray-600">{{__("Click the 'Sign Up' button in the top right corner and follow the simple registration process.")}}</p>
                            </div>

                            <div class="border-b border-gray-200 pb-4">
                                <h4 class="text-lg lg:text-xl font-semibold text-primary-950 mb-2">{{__("Is Wikybook free to use?")}}</h4>
                                <p class="lg:text-lg text-gray-600">{{__("Basic features are free. We also offer premium plans with enhanced features for avid readers.")}}</p>
                            </div>

                            <div>
                                <h4 class="text-lg lg:text-xl font-semibold text-primary-950 mb-2">{{__("How can authors join?")}}</h4>
                                <p class="lg:text-lg text-gray-600">{{__("Authors can register through our dedicated Author Portal and submit their works for review.")}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="lg:col-span-full opacity-0 animate-slide-up" style="animation-delay: 0.6s;">
                    <div
                        class="bg-white/70 backdrop-blur-md border-1 border-white/30 shadow-md border-gray-400 rounded-3xl p-10 relative overflow-hidden">
                        <div
                            class="absolute -top-40 -left-40 w-80 h-80 bg-gradient-to-br from-primary-100 to-primary-300 rounded-full opacity-20 blur-3xl"></div>
                        <div
                            class="absolute -bottom-40 -right-40 w-80 h-80 bg-gradient-to-tr from-primary-200 to-primary-400 rounded-full opacity-20 blur-3xl"></div>

                        <h3 class="text-2xl font-bold text-primary-950 mb-6 relative">{{__('Send Us a Message')}}</h3>

                        <livewire:contact-form/>
                    </div>
                </div>
            </div>

            <section class="text-center mt-24 pt-6 opacity-0 animate-fade-in" style="animation-delay: 1s;">
                <div class="max-w-md mx-auto mb-10">
                    <div class="h-px bg-gradient-to-r from-transparent via-primary-200 to-transparent"></div>
                </div>
            </section>
        </div>
    </div>
@endsection
