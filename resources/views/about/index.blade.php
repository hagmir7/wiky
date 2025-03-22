@extends('layout.base')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-white to-primary-50">
        <div class="container mx-auto px-6 pt-24 max-w-6xl overflow-hidden">
            <header class="text-center mb-24 opacity-0 animate-fade-in" style="animation-delay: 0.2s;">
                <div class="inline-block mb-3">
                    <span class="px-3 py-1 text-sm font-medium rounded-full bg-primary-100 text-primary-800 border border-primary-200">
                        {{__("Digital Library Platform")}}
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-primary-950 via-primary-800 to-primary-700 bg-clip-text text-transparent">
                    {{__("About Wikybook")}}
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    {{__("Connecting book lovers, authors, and readers in a vibrant digital library ecosystem.")}}
                </p>
            </header>

            <section class="grid lg:grid-cols-2 gap-16 items-center mb-24">
                <div class="space-y-6 opacity-0 animate-slide-right" style="animation-delay: 0.4s;">
                    <div class="inline-block mb-1">
                        <span class="px-3 py-1 text-sm font-medium rounded-full bg-primary-100 text-primary-800 border border-primary-200">
                            {{__("Our Purpose")}}
                        </span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">{{__("Our Mission")}}</h2>
                    <p class="text-gray-700 text-lg leading-relaxed mb-6">
                        {{__("Wikybook aims to revolutionize the way people discover, read, and interact with books. We're
                        building a comprehensive platform that bridges authors, readers, and book enthusiasts from
                        around the world.")}}
                    </p>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        {{__("Our goal is to create a collaborative space where literature thrives, knowledge is shared, and
                        reading becomes a more interactive and engaging experience.")}}
                    </p>
                    <div class="pt-6">
                        <a href="{{ route('contacts.index') }}" class="inline-flex items-center px-6 py-3 rounded-full bg-primary-600 text-white font-medium transition-all duration-300 lg:hover:bg-primary-700 lg:hover:shadow-lg lg:hover:shadow-primary-500/20">
                            {{__("Contact us")}}
                            <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="bg-primary-50/80 backdrop-blur-sm border border-primary-200/50 shadow-lg rounded-2xl p-4 md:p-10 opacity-0 animate-slide-up relative overflow-hidden" style="animation-delay: 0.6s;">
                    <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-gradient-to-br from-primary-200 to-primary-400 rounded-full opacity-20 blur-3xl"></div>
                    <h3 class="text-2xl font-bold text-primary-950 mb-8 relative">{{__('Key Features')}}</h3>
                    <ul class="space-y-3 md:space-y-6 relative">
                        <li class="group transition-all duration-300 lg:hover:-translate-y-1 lg:hover:shadow-lg">
                            <a href="#collections" class="flex items-start p-0 md:p-4 rounded-xl transition-all duration-300 lg:hover:bg-white/50">
                                <div class="relative flex h-14 w-24 sm:h-12 sm:w-12 items-center justify-center rounded-xl bg-primary-100 text-primary-600 transition-all duration-300 ease-in-out lg:group-hover:bg-primary-600 lg:group-hover:text-white me-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-primary-950 mb-1">{{__("Extensive Book Catalog")}}</h4>
                                    <p class="text-gray-600">{{__("Access thousands of books across all genres and
                                        categories")}}</p>
                                </div>
                            </a>
                        </li>

                        <li class="group transition-all duration-300 lg:hover:-translate-y-1 lg:hover:shadow-lg">
                            <a href="#authors" class="flex items-start m-0 md:p-4 rounded-xl transition-all duration-300 lg:hover:bg-white/50">
                                <div class="relative flex h-14 w-24 sm:h-12 sm:w-12 items-center justify-center rounded-xl bg-primary-100 text-primary-600 transition-all duration-300 ease-in-out lg:group-hover:bg-primary-600 lg:group-hover:text-white me-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-primary-950 mb-1">{{__("Author Profiles")}}</h4>
                                    <p class="text-gray-600">{{__("Connect with your favorite authors and discover new ones")}}</p>
                                </div>
                            </a>
                        </li>

                        <li class="group transition-all duration-300 lg:hover:-translate-y-1 lg:hover:shadow-lg">
                            <a href="#quotes" class="flex items-start m-0 md:p-4 rounded-xl transition-all duration-300 lg:hover:bg-white/50">
                                <div class="relative flex h-14 w-24 sm:h-12 sm:w-12 items-center justify-center rounded-xl bg-primary-100 text-primary-600 transition-all duration-300 ease-in-out lg:group-hover:bg-primary-600 lg:group-hover:text-white me-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-primary-950 mb-1">{{__("Community Reviews")}}</h4>
                                    <p class="text-gray-600">{{__("Read and write thoughtful reviews on your reading experiences")}}</p>
                                </div>
                            </a>
                        </li>

                        <li class="group transition-all duration-300 lg:hover:-translate-y-1 lg:hover:shadow-lg">
                            <a href="#quotes" class="flex items-start m-0 md:p-4 rounded-xl transition-all duration-300 lg:hover:bg-white/50">
                                <div class="relative flex h-14 w-24 sm:h-12 sm:w-12 items-center justify-center rounded-xl bg-primary-100 text-primary-600 transition-all duration-300 ease-in-out lg:group-hover:bg-primary-600 lg:group-hover:text-white me-4">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-primary-950 mb-1">{{__("Social Media Integration")}}</h4>
                                    <p class="text-gray-600">{{__("Share your reading journey across all your social platforms")}}</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>

            <section class="bg-white/70 backdrop-blur-md border-gray-400 border-1 border-white/30 shadow-xl rounded-3xl p-4 md:p-16 text-center mb-20 opacity-0 animate-fade-in relative overflow-hidden" style="animation-delay: 0.8s;">
                <div class="absolute -top-40 -left-40 w-80 h-80 bg-gradient-to-br from-primary-100 to-primary-300 rounded-full opacity-20 blur-3xl"></div>
                <div class="absolute -bottom-40 -right-40 w-80 h-80 bg-gradient-to-tr from-primary-200 to-primary-400 rounded-full opacity-20 blur-3xl"></div>

                <div class="inline-block mb-2 md:mb-3">
                    <span class="px-3 py-1 text-sm font-medium rounded-full bg-primary-100 text-primary-800 border border-primary-200">
                        {{__("Our Promise")}}
                    </span>
                </div>
                <h2 class="text-2xl md:text-4xl font-bold text-gray-900 mb-3 md:mb-8 relative text-left md:text-center">{{__("Our Commitment")}}</h2>
                <p class="text-xl text-gray-700 max-w-4xl mx-auto leading-relaxed relative text-left md:text-center">
                    {{__("We are dedicated to creating a platform that celebrates literature, supports authors, and provides
                    readers with an intuitive, enriching reading experience. Wikybook is more than just a website—it's a
                    community.")}}
                </p>

                <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
                    <div class="bg-white/50 p-3 md:p-6 rounded-2xl shadow-sm transition-all duration-300 lg:hover:shadow-md lg:hover:bg-white/80">
                        <div class="mb-4 w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center text-primary-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{__("Quality Content")}}</h3>
                        <p class="text-gray-600">{{__("Carefully curated books and resources to ensure a high standard of quality.")}}</p>
                    </div>

                    <div class="bg-white/50 p-3 md:p-6 rounded-2xl shadow-sm transition-all duration-300 lg:hover:shadow-md lg:hover:bg-white/80">
                        <div class="mb-4 w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center text-primary-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{__("User Privacy")}}</h3>
                        <p class="text-gray-600">{{__("Your reading habits and personal data are protected and never sold.")}}</p>
                    </div>

                    <div class="bg-white/50 p-3 md:p-6 rounded-2xl shadow-sm transition-all duration-300 lg:hover:shadow-md lg:hover:bg-white/80">
                        <div class="mb-4 w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center text-primary-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{__("Community Support")}}</h3>
                        <p class="text-gray-600">{{__("A supportive environment for readers and authors to connect and grow.")}}</p>
                    </div>
                </div>
            </section>

            <section class="text-center mt-24 pt-6 opacity-0 animate-fade-in" style="animation-delay: 1s;">
                <div class="max-w-md mx-auto mb-10">
                    <div class="h-px bg-gradient-to-r from-transparent via-primary-200 to-transparent"></div>
                </div>
            </section>
        </div>
    </div>
@endsection
