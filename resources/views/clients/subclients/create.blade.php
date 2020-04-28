@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <div class="px-6 py-6">
        <div class="flex items-center text-sm text-gray-500">
            <div class="flex items-center hover:text-gray-600">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <a href="{{ route('clients.index') }}" class="ml-2">Clients</a>
            </div>
            <div class="flex items-center">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span>{{ $client->display_name }}</a>
            </div>
            <div class="flex items-center hover:text-gray-600">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <a href="{{ route('subclients.index', ['client' => $client->id]) }}">Subclients</a>
            </div>
            <div class="flex items-center">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span class="text-green-500">Create new subclients</span>
            </div>
        </div>
    </div>

    <form action="{{ route('subclients.store', ['client' => $client->id]) }}" class="w-full" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="px-6 py-2 overflow-auto">
            <div class="min-w-full px-4 py-2 bg-white rounded shadow-md border-t-4 border-green-500">
                <div class="content flex py-2">
                    <div class="w-1/3">
                        <h2 class="mb-2 text-xl font-semibold">Details</h2>

                        <div class="mb-2 tracking-tight">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, voluptatem!
                        </div>

                        <div class="tracking-tight">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo impedit culpa sapiente laudantium natus id?
                        </div>
                    </div>

                    <div class="w-2/3 ml-6">
                        <div>
                            <div class="flex">
                                <div class="w-1/3 mr-2">
                                    <label for="name" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Name</label>

                                    <input id="name" name="name" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('name') border-red-600 text-red-800 @enderror" placeholder="piedpiper" value="{{ old('name') }}"/>

                                    @error('name')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <div class="w-2/3">
                                    <label for="appId" class="mb-2 block text-sm leading-5 font-medium text-gray-700">App ID</label>

                                    <input id="appId" name="app_id" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('app_id') border-red-600 text-red-800 @enderror" placeholder="com.piedpiper" value="{{ old('app_id') }}"/>

                                    @error('app_id')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <div class="w-full">
                                    <label for="description" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Description (optional)</label>
                                    <textarea id="description" name="description" class="form-textarea resize-none h-32 bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500" placeholder="Pied Piper is a multi-platform technology based on a proprietary universal compression algorithm that has consistently fielded high Weisman Score that are not merely competitive, but approach the theoretical limit of lossless compression."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-6 py-1 overflow-auto text-right">
            <button class="mt-4 px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Submit</button>
        </div>
    </form>
</div>
@endsection