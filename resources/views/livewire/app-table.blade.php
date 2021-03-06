<div class="flex flex-col">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="pt-1 pb-3 flex items-center justify-between">
            <div class="relative">
                <input wire:model="search" type="input" name="search" id="search" class="bg-gray-200 rounded-lg px-2 py-1 pl-8 pr-2 placeholder-gray-500 text-gray-800 border border-transparent focus:outline-none focus:bg-white focus:border-green-500" placeholder="Search">

                <svg class="text-gray-500 mt-1 ml-1 absolute top-0 left-0 w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>

                @if ($search)
                    <svg wire:click="clear" class="text-gray-500 mt-1 mr-1 absolute top-0 right-0 w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                @endif
            </div>

            <div>
                <div class="flex items-center relative">
                    <select wire:model="perPage" class="appearance-none bg-gray-200 text-gray-800 px-2 py-1 pr-8 block w-full border border-transparent focus:outline-none focus:bg-white focus:border-green-500">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-1 text-gray-500">
                        <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-gray-200"> 
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Bundles
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Client
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Project
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Created At
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($apps->count() === 0)
                        <tr>
                            <td class="text-center px-6 py-4 whitespace-no-wrap border-b border-gray-200" colspan="6">
                                <span class="text-sm leading-5 font-medium text-green-500">Opps!</span>
                                
                                <span class="text-sm leading-5 text-gray-700">Looks like there is no record for you...</span>
                            </td>
                        </tr>
                    @else
                        @foreach ($apps as $app)
                            <tr class="even:bg-gray-100">
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-700">
                                    {{ $app->name }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-700">
                                    {{ implode(', ', $app->bundles) }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-700">
                                    {{ $app->bqclient->name }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-700">
                                    {{ $app->bqproject->name }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-700">
                                    {{ $app->created_at->format('M d, Y') }}
                                </td>

                                <td class="w-32 px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                    <a href="{{ route('apps.edit', ['app' => $app->id]) }}" class="text-green-500 hover:text-green-700">Edit</a>

                                    {{-- <a href="" class="ml-2 text-green-500 hover:text-green-700">Apps</a> --}}

                                    {{-- <a href="{{ route('subclients.index', $client->id) }}" class="ml-2 text-green-500 hover:text-green-700">Subclient</a>
                                    
                                    @if ($client->subclient->count() == 0)
                                        <a href="{{ route('clients_analytics.index', $client->id) }}" class="ml-2 text-green-500 hover:text-green-700">Analytics</a>
                                    @endif --}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    
                </tbody>
            </table>
        </div>
        <div class="bg-white pt-3 pb-1 flex items-center justify-between border-t border-gray-200">
            <div class="flex-1 flex items-center justify-between">
                {{ $apps->links() }}
            </div>
        </div>
    </div>
</div>
