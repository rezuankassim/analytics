@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <div class="px-6 py-6">
        <div class="flex items-center text-sm text-gray-500">
            <div class="flex items-center hover:text-gray-600">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <a href="{{ route('projects.index') }}" class="ml-2">Projects</a>
            </div>

            <div class="flex item-center">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span class="text-gray-500">{{ $project->name }}</span>
            </div>

            <div class="flex item-center">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span class="text-green-500">Edit</span>
            </div>
        </div>
    </div>

    <form action="{{ route('projects.update', ['project' => $project->id]) }}" class="w-full" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="px-6 py-1 overflow-auto">
            <div class="min-w-full px-4 py-2 bg-white rounded-md shadow-md border-t-4 border-green-500">
                <div class="content py-2 pb-4 border-b-2 border-gray-200">
                    <div class="flex pb-4 border-b-2 border-gray-200">
                        <div class="w-1/3">
                            <h2 class="mb-2 text-xl font-semibold">Details</h2>
                        </div>
    
                        <div class="w-2/3 ml-6">
                            <div>
                                <div class="flex">
                                    <div class="w-1/3 mr-2">
                                        <label for="name" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Name</label>
    
                                        <input id="name" name="name" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('name') border-red-600 text-red-800 @enderror" placeholder="piedpiper" value="{{ old('name') ?? $project->name }}"/>
    
                                        @error('name')
                                            <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex pt-4">
                        <div class="w-1/3">
                            <h2 class="mb-2 text-xl font-semibold">Google Account Details</h2>
                        </div>
    
                        <div class="w-2/3 ml-6">
                            <div>
                                <div class="flex">
                                    <div class="w-1/3 mr-2">
                                        <label for="projectId" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Project ID</label>
    
                                        <input id="projectId" name="google_project_id" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('projectId') border-red-600 text-red-800 @enderror" placeholder="pied-piper-123" value="{{ old('projectId') ?? $project->google_project_id }}"/>
    
                                        @error('projectId')
                                            <span class="mt-4 text-sm font-thin text-red-600 tracking-tight" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="w-2/3">
                                        <label for="bqDataset" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Big Query Dataset</label>
    
                                        <input id="bqDataset" name="google_bq_dataset_name" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500 @error('bqDataset') border-red-600 text-red-800 @enderror" placeholder="analytics_123456" value="{{ old('google_bq_dataset_name') ?? $project->google_bq_dataset_name }}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="overflow-auto text-right">
                    <button class="mt-4 px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <div class="px-6 py-1 overflow-auto">
        <div class="min-w-full px-4 py-2 bg-white rounded-md shadow-md border-t-4 border-green-500">
            <div class="content py-2">
                <div class="flex pb-4">
                    <div class="w-1/3">
                        <h2 class="mb-2 text-xl font-semibold">Google Service Account Credential</h2>
                    </div>

                    <div class="w-2/3 ml-6">
                        <div>
                            <form action="{{ route('projects_credentials.update', ['project' => $project->id]) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="flex">
                                    <div class="w-full relative" x-data>
                                        <label for="description" class="mb-2 block text-sm leading-5 font-medium text-gray-700">Service Account Credential</label>

                                        <div class="flex items-center">
                                            <div class="flex-1 mr-2">
                                                <input type="input" x-ref="credentialInput" @click="$refs.credential.click()" class="form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 cursor-pointer focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500" placeholder="piedpiper.json" readonly value="{{ $project->google_credential_file_name }}">

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
    </div>
</div>

@endsection