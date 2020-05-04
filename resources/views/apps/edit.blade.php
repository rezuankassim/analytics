@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <div class="px-6 py-6">
        <div class="flex items-center text-sm text-gray-500">
            <div class="flex items-center hover:text-gray-600">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>

                <a href="{{ route('apps.index') }}" class="ml-2">Apps</a>
            </div>
            
            <div class="flex items-center">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span>{{ $app->name }}</span>
            </div>

            <div class="flex items-center">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span class="text-green-500">Edit</span>
            </div>
        </div>
    </div>

    <form action="{{ route('apps.update', ['app' => $app->id]) }}" class="w-full" method="POST">
        @csrf
        @method('PUT')

        <div class="px-6 py-2 overflow-auto">
            <div class="min-w-full px-4 py-2 bg-white rounded-md shadow-md border-t-4 border-green-500">
                <div class="content flex py-2">
                    <div class="w-1/3">
                        <h2 class="mb-2 text-xl font-semibold">Details</h2>

                        <div class="mb-2 tracking-tight text-gray-500">
                            The details of the app
                        </div>
                    </div>

                    <div class="w-2/3 ml-6">
                        <div class="border-b border-gray-300 pb-4">
                            <div class="flex">
                                <div class="w-1/3">
                                    <label for="name" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Name</label>

                                    <input id="name" name="name" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('name') border-red-600 text-red-800 @enderror" placeholder="piedpiper" value="{{ old('name') ?? $app->name }}"/>

                                    @error('name')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <div class="w-1/2 mr-2">
                                    <label for="client" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Client</label>

                                    <select id="client" name="client" class="form-select bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('client') border-red-600 text-red-800 @enderror">
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}" @if($client->id == $app->client_id) selected @endif>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
    
                                    @error('client')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <div class="w-1/2">
                                    <label for="project" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Project</label>

                                    <select name="project" id="project" class="form-select bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('project') border-red-600 text-red-800 @enderror">
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}" @if($project->id == $app->project_id) selected @endif>{{ $project->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('project')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-2">
                                <div class="w-full">
                                    <label for="bundles" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Bundles</label>
                                
                                    <input type="text" id="bundles" name="bundles" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('bundles') border-red-600 text-red-800 @enderror" placeholder="com.app.app1,com.app.app2" value="{{ old('bundles') ?? implode(', ', $app->bundles) }}">

                                    @error('bundles')
                                        <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="pt-2 text-right">
                            <button class="mt-2 px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="px-6 py-2 overflow-auto" x-data="{ isOpen: false }">
        <div class="min-w-full px-4 py-2 bg-white rounded-md shadow-md border-t-4 border-red-500">
            <div class="content flex py-4">
                <div class="w-3/4">
                    <h2 class="mb-2 text-xl font-semibold">Delete</h2>

                    <div class="mb-2 tracking-tight">
                        This will delete the app
                    </div>
                </div>

                @livewire('delete-modal', [ 'model' => $app, 'deleteRoute' => route('apps.destroy', ['app' => $app->id])])
            </div>
        </div>
    </div>
</div>
@endsection