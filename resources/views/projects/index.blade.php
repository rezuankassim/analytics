@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <div class="px-6 py-6">
        <div class="flex items-center text-sm">
            <div class="flex items-center text-green-500">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <span class="ml-2">Projects</span>
            </div>
        </div>
    </div>
    
    <div class="px-6 py-2 overflow-auto">
        <div class="min-w-full px-4 py-2 bg-white rounded-md shadow-md">
            <div class="header flex items-center justify-between py-2">
                <h2 class="text-lg tracking-wider">Projects</h2>

                <a href="{{ route('projects.create') }}" class="flex items-center text-sm text-white py-2 px-4 bg-green-500 rounded uppercase tracking-wider hover:bg-green-600">
                    New Project
                </a>
            </div>

            <div class="content py-2">
                @livewire('project-table')
            </div>
        </div>
    </div>
</div>
@endsection