@extends('layout.base')

@section('content')
<section class="max-w-7xl mx-auto px-4 py-6">
    <h1 class="max-w-4xl mx-auto text-2xl md:text-4xl tracking-wide text-center font-bold text-gray-800 py-6">
        Wecima - Books Summaries, Reviews, and Author Insights
    </h1>

    <div class="w-full flex flex-col items-center justify-center">
        <div class="flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

            <p class="text-sm font-semibold text-gray-400"> Dec 19, 2024 </p>
        </div>


        <ul class="flex items-center space-x-2 py-4">
            <li>
                <a href="#"
                    class="inline-block bg-white text-blue-600 hover:bg-blue-600 hover:text-white transition-all ease-in-out duration-500 shadow-lg rounded-full p-2">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#"
                    class="inline-block bg-white text-black hover:bg-black transition ease-in-out duration-500  hover:text-white shadow-lg rounded-full p-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#"
                    class="inline-block bg-white text-green-500 hover:bg-green-500 hover:text-white transition-all ease-in-out duration-500 shadow-lg rounded-full p-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z"
                            clip-rule="evenodd" />
                        <path fill="currentColor"
                            d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
                    </svg>
                </a>
            </li>
            <li>
                <a href="#"
                    class="inline-block bg-white text-blue-400 hover:bg-blue-400 hover:text-white transition-all ease-in-out duration-500 shadow-lg rounded-full p-2">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 10l-4 4l6 6l4 -16l-18 7l4 2l2 6l3 -4" />
                    </svg>
                </a>
            </li>
    </div>

    <div class="w-full max-w-4xl mx-auto py-6">
        <div class="w-full">
            <img src="https://wecima.uk/storage/01JFG9FW47KBG6R4DS0XJJTNXW.webp" alt="blog image"
                class="w-full object-cover rounded-lg shadow-lg">
        </div>

        <div class="text-gray-500">
            <p class="text-lg py-6">
                Dathan Auerbach’s novel Penpal is an unsettling, psychological horror story that masterfully intertwines
                childhood innocence with dark suspense. The novel, which originated from a series of short stories on
                Reddit’s “NoSleep” forum, delves into themes of memory, trauma, and the sinister undercurrents that can
                flow through ordinary life.
            </p>

            {{-- content --}}
            <h2 class="text-xl md:text-2xl font-bold text-gray-800 py-3">Plot Overview</h2>
            <p class="text-lg">
                The story follows the protagonist, who remains unnamed throughout the novel, as he recounts a series of
                eerie events that occurred during his childhood. The narrative unfolds in a nonlinear fashion, with each
                chapter revealing a new piece of the puzzle. The protagonist’s memories are fragmented and disjointed,
                mirroring the fractured nature of his psyche.
            </p>
        </div>
    </div>

</section>
@endsection
