<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        @livewireStyles
    </head>

    <body class="sans bg-gray-200 text-gray-700">
        @auth
            <div class="relative flex flex-row min-h-screen">
                <div class="flex flex-col w-56 bg-white border border-gray-300">
                    <a href="#" class="mx-auto py-4 text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">{{ config('app.name', 'Laravel') }}</a>

                    <a href="{{ route('dashboard') }}" class="block border-r-2 text-md text-gray-800 px-4 py-2 hover:bg-gray-200 @if(Route::currentRouteName() == 'dashboard') border-green-500 font-semibold @else border-transparent @endif">
                        <div class="flex">
                        <svg class="stroke-current @if(Route::currentRouteName() == 'dashboard') text-green-500 @else text-gray-500 @endif" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <span class="ml-4">Dashboard</span>
                        </div>
                    </a>

                    {{-- <div x-data="{ isOpen: false }"> --}}
                        <a href="{{ route('clients.index') }}" class="block border-r-2 text-md text-gray-800 px-4 py-2 hover:bg-gray-200 @if(Route::is('clients.*')) border-green-500 font-semibold @else border-transparent @endif">
                            <div class="flex items-center">
                                <svg class="stroke-current @if(Route::is('clients.*')) text-green-500 @else text-gray-500 @endif" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 4.35418C12.7329 3.52375 13.8053 3 15 3C17.2091 3 19 4.79086 19 7C19 9.20914 17.2091 11 15 11C13.8053 11 12.7329 10.4762 12 9.64582M15 21H3V20C3 16.6863 5.68629 14 9 14C12.3137 14 15 16.6863 15 20V21ZM15 21H21V20C21 16.6863 18.3137 14 15 14C13.9071 14 12.8825 14.2922 12 14.8027M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                <span class="ml-4 flex-1">Clients</span>
                                {{-- <div>
                                    <template x-if="!isOpen">
                                        <svg class="w-6 h-6 text-gray-500 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </template>
                                    <template x-if="isOpen">
                                        <svg class="w-6 h-6 text-gray-500 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <path d="M5 15l7-7 7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </template>
                                </div> --}}
                            </div>
                        </a>

                        {{-- <div x-show="isOpen">
                            <a href="#" class="block bg-gray-200 font-semibold text-sm text-gray-800 pl-12 pr-4 py-2">QMS Commudesk</a>
                            <a href="#" class="block bg-gray-200 text-sm text-gray-800 pl-12 pr-4 py-2">Simedarby</a>
                        </div> --}}
                    {{-- </div> --}}

                    
                </div>
                <div class="flex-1 bg-gray-200 min-h-screen">
                    <div class="flex flex-col relative">
                        <div class="flex justify-end bg-white px-4 py-2 shadow-lg">
                            <div class="relative" x-data="{ isOpen: false }">
                                <a href="#" @click.prevent="isOpen = !isOpen">
                                    <img src="{{ asset('/storage/uploads/avatars/IMG_0222.JPG') }}" alt="avatar" class="rounded-full h-8 w-8 object-cover">
                                </a>

                                <div x-show="isOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg z-20">
                                    <div class="rounded-md bg-white shadow">
                                        <div class="py-1">
                                            <a href="#" class="block py-2 text-sm leading-5 text-gray-800 flex items-center hover:bg-gray-200 focus:outline-none focus:bg-gray-200 focus:text-gray-800">
                                                <div class="px-3 text-gray-500">
                                                    <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
                                                </div>
                                                
                                                <span>Your Profile</span>
                                            </a>
                                            
                                            <a href="#" class="block py-2 text-sm leading-5 text-gray-800 flex items-center hover:bg-gray-200 focus:outline-none focus:bg-gray-200 focus:text-gray-800">
                                                <div class="px-3 text-gray-500">
                                                    <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M512.1 191l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0L552 6.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zm-10.5-58.8c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.7-82.4 14.3-52.8 52.8zM386.3 286.1l33.7 16.8c10.1 5.8 14.5 18.1 10.5 29.1-8.9 24.2-26.4 46.4-42.6 65.8-7.4 8.9-20.2 11.1-30.3 5.3l-29.1-16.8c-16 13.7-34.6 24.6-54.9 31.7v33.6c0 11.6-8.3 21.6-19.7 23.6-24.6 4.2-50.4 4.4-75.9 0-11.5-2-20-11.9-20-23.6V418c-20.3-7.2-38.9-18-54.9-31.7L74 403c-10 5.8-22.9 3.6-30.3-5.3-16.2-19.4-33.3-41.6-42.2-65.7-4-10.9.4-23.2 10.5-29.1l33.3-16.8c-3.9-20.9-3.9-42.4 0-63.4L12 205.8c-10.1-5.8-14.6-18.1-10.5-29 8.9-24.2 26-46.4 42.2-65.8 7.4-8.9 20.2-11.1 30.3-5.3l29.1 16.8c16-13.7 34.6-24.6 54.9-31.7V57.1c0-11.5 8.2-21.5 19.6-23.5 24.6-4.2 50.5-4.4 76-.1 11.5 2 20 11.9 20 23.6v33.6c20.3 7.2 38.9 18 54.9 31.7l29.1-16.8c10-5.8 22.9-3.6 30.3 5.3 16.2 19.4 33.2 41.6 42.1 65.8 4 10.9.1 23.2-10 29.1l-33.7 16.8c3.9 21 3.9 42.5 0 63.5zm-117.6 21.1c59.2-77-28.7-164.9-105.7-105.7-59.2 77 28.7 164.9 105.7 105.7zm243.4 182.7l-8.2 14.3c-3 5.3-9.4 7.5-15.1 5.4-11.8-4.4-22.6-10.7-32.1-18.6-4.6-3.8-5.8-10.5-2.8-15.7l8.2-14.3c-6.9-8-12.3-17.3-15.9-27.4h-16.5c-6 0-11.2-4.3-12.2-10.3-2-12-2.1-24.6 0-37.1 1-6 6.2-10.4 12.2-10.4h16.5c3.6-10.1 9-19.4 15.9-27.4l-8.2-14.3c-3-5.2-1.9-11.9 2.8-15.7 9.5-7.9 20.4-14.2 32.1-18.6 5.7-2.1 12.1.1 15.1 5.4l8.2 14.3c10.5-1.9 21.2-1.9 31.7 0l8.2-14.3c3-5.3 9.4-7.5 15.1-5.4 11.8 4.4 22.6 10.7 32.1 18.6 4.6 3.8 5.8 10.5 2.8 15.7l-8.2 14.3c6.9 8 12.3 17.3 15.9 27.4h16.5c6 0 11.2 4.3 12.2 10.3 2 12 2.1 24.6 0 37.1-1 6-6.2 10.4-12.2 10.4h-16.5c-3.6 10.1-9 19.4-15.9 27.4l8.2 14.3c3 5.2 1.9 11.9-2.8 15.7-9.5 7.9-20.4 14.2-32.1 18.6-5.7 2.1-12.1-.1-15.1-5.4l-8.2-14.3c-10.4 1.9-21.2 1.9-31.7 0zM501.6 431c38.5 29.6 82.4-14.3 52.8-52.8-38.5-29.6-82.4 14.3-52.8 52.8z"/></svg>
                                                </div>
                            
                                                <span>Settings</span>
                                            </a>
                            
                                            <a href="#" class="block py-2 text-sm leading-5 text-gray-800 flex items-center hover:bg-gray-200 focus:outline-none focus:bg-gray-200 focus:text-gray-800" @click="event.preventDefault(); document.querySelector('#logout-form').submit()">
                                                <div class="px-3 text-gray-500">
                                                    <svg class="fill-current w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"/></svg>
                                                </div>
                            
                                                <span>Sign out</span>
                                            </a>
                                            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" x-show="false">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="container mx-auto h-full bg-gray-200">
                            @yield('content')
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div x-data="{ isOpen: true }">
                        <div x-show="isOpen" class="mt-20 w-1/4 mr-6 py-2 px-4 flex absolute top-0 right-0 bg-green-200 text-green-700 rounded">
                            <div>
                                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                            <div class="flex-1 flex flex-wrap px-2 pr-6">
                                {{ $message }}
                            </div>
                            <div @click="isOpen = false" class="cursor-pointer hover:text-green-900">
                                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                        </div>
                    </div>
                @endif
                
            </div>
        @else
            <div class="flex items-center bg-white shadow px-4 py-4">
                <a href="{{ route('welcome') }}" class="text-lg tracking-wider flex-1 text-gray-900">{{ config('app.name', 'Laravel') }}</a>
                <div class="flex">
                    <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-600">Login</a>
                    <a href="{{ route('register') }}" class="ml-4 text-gray-900 hover:text-gray-600">Register</a>
                </div>
            </div>

            <div class="container mx-auto py-16">
                @yield('content')
            </div>
        @endauth
        
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
