@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <div class="px-6 py-6">
        <div class="flex items-center text-sm text-gray-500">
            <div class="flex items-center hover:text-gray-600">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <a href="{{ route('clients.index') }}" class="ml-2">Clients</a>
            </div>
            <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span class="text-green-500">Create New Client</span>
        </div>
    </div>

    <div class="px-6" x-data="{ isShown: true }" :class="{ 'mb-3': isShown }">
        <div x-show="isShown" class="w-full text-blue-700 bg-blue-200 border-t-2 border-blue-500 px-4 py-2 rounded flex items-center">
            <svg class="w-6 h-6 text-blue-500 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <span class="flex-1 pl-4">Please make sure that the google analytics' details is valid!</span>
            <svg @click="isShown = false" class="w-6 h-6 text-blue-500 stroke-current cursor-pointer hover:text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
    </div>

    <div class="px-6 py-2 overflow-auto">
        <div class="min-w-full px-4 py-2 bg-white rounded shadow-md border-t-4 border-green-500">
            <form action="{{ route('clients.update', $client->id) }}" class="w-full" method="POST"> 
                @csrf
                <div class="content flex border-b border-gray-500 py-4">
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

                                    <input id="name" name="name" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('name') border-red-600 text-red-800 @enderror" placeholder="piedpiper" value="{{ old('name') ?? $client->name }}"/>

                                    @error('name')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="w-2/3">
                                    <label for="displayName" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Display Name</label>

                                    <input id="displayName" name="display_name" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('display_name') border-red-600 text-red-800 @enderror" placeholder="Pied Piper" value="{{ old('display_name') ?? $client->display_name }}"/>

                                    @error('display_name')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <div class="w-full">
                                    <label for="description" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Description (optional)</label>
                                    <textarea id="description" name="description" class="form-textarea resize-none h-32 bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500" placeholder="Pied Piper is a multi-platform technology based on a proprietary universal compression algorithm that has consistently fielded high Weisman Score that are not merely competitive, but approach the theoretical limit of lossless compression.">{{ $client->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content flex border-b border-gray-500 py-4">
                    <div class="w-1/3">
                        <h2 class="mb-2 text-xl font-semibold">Google Account Details</h2>
    
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
                                    <label for="projectId" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Project ID</label>

                                    <input id="projectId" name="google_project_id" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('google_project_id') border-red-600 text-red-800 @enderror" placeholder="pied-piper-123" value="{{ old('google_project_id') ?? $client->google_project_id }}"/>

                                    @error('google_project_id')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="w-2/3">
                                    <label for="bqDataset" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Big Query Dataset</label>

                                    <input id="bqDataset" name="google_bq_dataset_name" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('google_bq_dataset_name') border-red-600 text-red-800 @enderror" placeholder="analytics_123456" value="{{ old('projectId') ?? $client->google_bq_dataset_name }}"/>

                                    @error('google_bq_dataset_name')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button class="mt-4 px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="px-6 py-2 overflow-auto">
        <div class="min-w-full px-4 py-2 bg-white rounded shadow-md border-t-4 border-green-500">
            <div class="content flex py-4">
                <div class="w-1/3">
                    <h2 class="mb-2 text-xl font-semibold">Google Service Account Credential</h2>

                    <div class="mb-2 tracking-tight">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, voluptatem!
                    </div>

                    <div class="tracking-tight">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo impedit culpa sapiente laudantium natus id?
                    </div>
                </div>

                <div class="w-2/3 ml-6">
                    <div>              
                        <form action="{{ route('clients_credentials.store', $client->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div>
                                @if (!$client->google_credential)
                                    <div x-data="{ isShown: true }" :class="{ 'mb-3': isShown }">
                                        <div x-show="isShown" class="w-full text-orange-700 bg-orange-200 border-t-2 border-orange-500 px-4 py-2 rounded flex items-center">
                                            <svg class="w-6 h-6 text-orange-500 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            <span class="flex-1 pl-4">Client can only be active until credential file been uploaded</span>
                                        </div>
                                    </div>
                                @endif

                                <div class="w-full relative" x-data>
                                    <label for="description" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Service Account Credential</label>

                                    <div class="flex items-center">
                                        <div class="flex-1 mr-2">
                                            <input type="input" x-ref="credentialInput" @click="$refs.credential.click()" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 cursor-pointer focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500" placeholder="piedpiper.json" readonly value="{{ $client->google_credential_file_name }}">

                                            <input type="file" x-ref="credential" @input="$refs.credentialInput.value = event.target.files[0].name" name="credential" id="credential" class="mt-8 absolute top-0 left-0 appearance-none w-full" accept="application/json" hidden>
                                        </div>

                                        <button class="px-3 py-2 flex text-gray-500 rounded hover:text-green-500">
                                            <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M8 17a5 5 0 01-.916-9.916 5.002 5.002 0 019.832 0A5.002 5.002 0 0116 17m-7-5l3-3m0 0l3 3m-3-3v12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                            <span class="ml-1">Upload</span>
                                        </button>
                                    </div>
                                    

                                    @error('credential')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-6 py-2 overflow-auto" x-data="{ isOpen: false }">
        <div class="min-w-full px-4 py-2 bg-white rounded shadow-md border-t-4 border-red-500">
            <div class="content flex py-4">
                <div class="w-3/4">
                    <h2 class="mb-2 text-xl font-semibold">Delete</h2>

                    <div class="mb-2 tracking-tight">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam inventore quae veritatis cumque cupiditate magni molestiae iure natus iste saepe.
                    </div>
                </div>
                
                <div class="w-1/4 text-right">
                    <button type="button" @click="isOpen = true" class="text-white bg-red-500 px-4 py-2 rounded hover:bg-red-600">Delete</button>
                </div>
            </div>
        </div>

        <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center" x-show.transition.opacity="isOpen">
            <div class="modal-overlay absolute w-full h-full bg-gray-500 opacity-50"></div>
            
            <div class="container mx-auto lg:px-32 z-50 rounded-lg overflow-y-auto px-8">
                <div class="bg-white mx-auto w-2/4 rounded shadow" x-on:click.away="isOpen = false">
                    <div class="flex items-center px-4 py-2">
                        <span class="flex-1 text-lg text-gray-700 font-semibold">Are you absolutely sure?</span>
                        <svg @click="isOpen = false" class="w-6 h-6 text-gray-500 stroke-current cursor-pointer hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                    <div class="modal-body px-4 py-2">
                        <div class="text-gray-600 tracking-tight">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit inventore nulla eius quam alias eligendi ea repellat? Dicta, quis amet?
                        </div>
                        <div class="text-gray-600 tracking-tight my-2">
                            Please type <span class="text-red-500 font-semibold">{{ $client->name }}</span> to confirm.
                        </div>
                        <form action="#" method="POST" x-data="{ name: '', correctName: '{{ $client->name }}'}">
                            @csrf
                            <input type="text" x-model="name" class="my-2 form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500">

                            <button :class="{ 'opacity-50 cursor-not-allowed': name !== correctName, 'hover:bg-red-600': name === correctName }" class="mb-2 w-full px-4 py-2 bg-red-500 text-white rounded">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection