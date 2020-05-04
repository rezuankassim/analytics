@extends('layouts.app')

@section('content')
<div class="flex flex-1 flex-col">
    <div class="px-6 py-6">
        <div class="flex items-center text-sm">
            <div class="flex items-center text-green-500">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <span class="ml-2">Dashboard</span>
            </div>
        </div>
    </div>
    
    <div class="px-6 py-1">
        <div>
            <h2 class="pt-1 pb-2 text-lg font-light">Recently Logged Client</h2>

            <div class="flex overflow-x-auto py-2">
                @forelse ($clients as $client)
                <div class="mr-4 flex-shrink-0 w-64 bg-white rounded-md shadow-md">
                    <div class="content px-4 py-2 block">
                        <span class="text-md font-semibold block">{{ $client->name }}</span>

                        <span class="text-md text-gray-500">{{ $client->last_logged_at->format('d/m/Y H:i')}}</span>
                    </div>
                    
                    <div class="px-4 py-2 bg-gray-300 text-gray-600 flex justify-center rounded-b-md">
                        <a href="" class="flex items-center hover:text-gray-800">
                            <span>View Client</span>

                            <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        </a>
                    </div>
                </div>
                @empty
                <div class="mr-4 flex-shrink-0 w-64 bg-gray-400 rounded-md shadow-md">
                    <div class="content px-4 py-2 h-24"></div>
                </div>
                @endforelse
            </div>
        </div>
        
        <div class="mt-4">
            <h2 class="pt-1 pb-2 text-lg font-light">Imported BigQuery Data</h2>

            <div class="min-w-full px-4 py-2 bg-white rounded-md shadow-md">
                <div class="content py-2">
                    @livewire('bqtable-table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
