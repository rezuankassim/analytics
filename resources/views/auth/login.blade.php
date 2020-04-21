@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center bg-gray-50">
    <div class="max-w-md w-full">
        <div>
            <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                {{ __('auth.signInToYourAccount') }}
            </h2>
        </div>
        <div class="bg-white rounded shadow mt-12">
            <form class="p-8" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <div>
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
                </div>
    
                <div class="mt-6 flex items-center justify-between">
                    <div class="flex items-center">

                        <input id="remember_me" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                        
                        <label for="remember_me" class="ml-2 block text-sm leading-5 text-gray-900">
                            Remember me
                        </label>

                    </div>
    
                    <div class="text-sm leading-5">
                        <a href="#" class="font-medium text-green-500 hover:text-green-400 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div>
    
                <div class="mt-6">
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-green-500 hover:bg-green-400 focus:outline-none focus:border-green-600 focus:shadow-outline-indigo active:bg-green-600 transition duration-150 ease-in-out">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-green-300 group-hover:text-green-400 transition ease-in-out duration-150" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        Sign in
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
