@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <div class="px-6 py-6">
        <div class="flex items-center text-sm text-gray-500">
            <div class="flex items-center hover:text-gray-700">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                
                <a href="{{ route('clients.index') }}" class="ml-2">Clients</a>
            </div>

            <div class="flex items-center">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span>{{ $client->name }}</span>
            </div>

            <div class="flex items-center">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span class="text-green-500">Apps</span>
            </div>
        </div>
    </div>
    
    <div class="px-6 py-2 overflow-auto">
        <div class="min-w-full px-4 py-2 bg-white rounded-md shadow-md">
            <div class="header flex items-center justify-between py-2">
                <h2 class="text-lg tracking-wider">Apps</h2>

                <a href="{{ route('apps.create', ['client' => $client]) }}" class="flex items-center text-sm text-white py-2 px-4 bg-green-500 rounded uppercase tracking-wider hover:bg-green-600">
                    New apps
                </a>
            </div>

            <div class="content py-2">
                @livewire('app-table')
            </div>
        </div>
    </div>
</div>
@endsection