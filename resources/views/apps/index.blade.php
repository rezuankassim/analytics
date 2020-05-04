@extends('layouts.app')

@section('content')
<div class="flex flex-col">
    <div class="px-6 py-6">
        <div class="flex items-center text-sm">
            <div class="flex items-center text-green-500">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>

                <span class="ml-2">Apps</span>
            </div>
        </div>
    </div>
    
    <div class="px-6 py-2 overflow-auto">
        <div class="min-w-full px-4 py-2 bg-white rounded-md shadow-md">
            <div class="header flex items-center justify-between py-2">
                <h2 class="text-lg tracking-wider">Apps</h2>

                <a href="{{ route('apps.create') }}" class="flex items-center text-sm text-white py-2 px-4 bg-green-500 rounded uppercase tracking-wider hover:bg-green-600">
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