@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full">
        <div>
            <h2 class="mt-3 text-center text-3xl leading-9 font-extrabold text-gray-900">
                <span class="text-green-500">Convep</span>
                <span>Analytics</span>
            </h2>
            
            <h2 class="mt-3 text-center text-xl leading-9 font-extrabold text-gray-700">
                {{ __('auth.createNewAccount') }}
            </h2>
        </div>
        <div class="bg-white rounded shadow mt-12">
            <form class="p-8" action="{{ route('register') }}" method="POST">
                @csrf
                <div>
                    <div>
                        <label for="name" class="block text-sm leading-5 font-medium text-gray-700">Name</label>

                        <input 
                            aria-label="Name" 
                            name="name" 
                            type="name" 
                            required 
                            class="rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 @error('name') border-red-600 @enderror"/>

                        @error('name')
                            <span class="mt-4 text-sm font-thin text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="email" class="block text-sm leading-5 font-medium text-gray-700">Email Address</label>

                        <input 
                            aria-label="Email address" 
                            name="email" 
                            type="email" 
                            required 
                            class="rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 @error('email') border-red-600 @enderror"/>

                        @error('email')
                            <span class="mt-4 text-sm font-thin text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password" class="block text-sm leading-5 font-medium text-gray-700">Password</label>

                        <input 
                            aria-label="Password" 
                            name="password" 
                            type="password" 
                            required 
                            class="rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 @error('password') border-red-600 @enderror"/>

                        @error('password')
                            <span class="mt-4 text-sm font-thin text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="password-confirm" class="block text-sm leading-5 font-medium text-gray-700">Password Confirmation</label>

                        <input 
                            aria-label="Password"
                            id="password-confirm"
                            name="password_confirmation" 
                            type="password" 
                            required 
                            class="rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5 @error('password') border-red-600 @enderror"/>

                        @error('password')
                            <span class="mt-4 text-sm font-thin text-red-600" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-500 hover:bg-green-600 focus:outline-none focus:border-green-600 focus:shadow-outline-indigo active:bg-green-600 transition duration-150 ease-in-out">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-green-300 group-hover:text-green-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
