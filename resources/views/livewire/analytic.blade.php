<div x-data="{ isOpen: false }">
    <div class="flex justify-end">
        <div class="flex items-center">
            <button type="button" @click="isOpen = true" class="px-1 py-1 text-green-900 bg-green-500 rounded hover:bg-green-700">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </button>
            <div wire:ignore class="relative ml-2">
                <input wire:model="date" type="text" name="date" id="date" class="form-input px-2 pl-8 py-1 bg-gray-400 text-gray-800 placeholder-gray-600 border-1 border-transparent focus:bg-white focus:border-green-500 focus:outline-none focus:shadow-none" placeholder="Date">
                <svg class="mt-1 ml-1 absolute top-0 left-0 text-gray-600 w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
        </div>
    </div>
    <div class="flex">
        @if ($user_analytic->contains('name', 'get active users by platform'))
            <div class="my-4 px-4 py-4 flex-grow bg-white shadow rounded" wire:ignore>
                <div class="header">
                    <h2 class="text-gray-700 font-lg font-semibold tracking-wider">Active Users by Platform</h2>
                </div>
                <div class="content">
                    {{ $activeUsersByPlatformChart->container() }}
                </div>
            </div>
        @endif
    
        @if ($user_analytic->contains('name', 'get all event name with event count'))
            <div class="my-4 px-4 py-4 ml-3 flex-1 bg-white shadow rounded" wire:ignore>
                <div class="header">
                    <h2 class="text-gray-700 font-lg font-semibold tracking-wider">Event Count by Users</h2>
                </div>
                <div class="content">
                    {{ $allEventWithEventCountChart->container() }}
                </div>
            </div>
        @endif
    </div>

    <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center" x-show.transition.opacity="isOpen">
        <div class="modal-overlay absolute w-full h-full bg-gray-500 opacity-50"></div>
        
        <div class="container mx-auto lg:px-32 z-50 rounded-lg overflow-y-auto px-8">
            <div class="bg-white mx-auto w-2/4 rounded shadow" @click.away="isOpen = false">
                <div class="flex items-center px-4 py-2">
                    <span class="flex-1 text-lg text-gray-700 font-semibold">Filter</span>
                    <svg @click="isOpen = false" class="w-6 h-6 text-gray-500 stroke-current cursor-pointer hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <div class="modal-body px-4 py-2">
                    <div class="text-gray-600 tracking-tight">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit inventore nulla eius quam alias eligendi ea repellat? Dicta, quis amet?
                    </div>
                    <form action="{{ route('clients_analytics_filter.update', $client->id) }}" method="POST">
                        @csrf
                        @foreach ($analytics as $analytic)
                            <div class="my-2">
                                <label class="inline-flex items-center">
                                  <input type="checkbox" name="{{ $analytic->name }}" value="1" class="form-checkbox text-green-500" @if($user_analytic->contains('name', $analytic->name)) checked @endif>
                                  <span class="ml-2"> {{ $analytic->name }}</span>
                                </label>
                            </div>
                        @endforeach
                        
                        <button class="mb-2 px-4 py-2 bg-green-500 text-white rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    {!! $activeUsersByPlatformChart->script() !!}
    {!! $allEventWithEventCountChart->script() !!}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $('#date').daterangepicker({
                "locale": {
                    "format": "DD/MM/YYYY",
                },
                "startDate": moment().subtract(1, 'days'),
                "endDate": moment().subtract(1, 'days'),
                "opens": "left"
            })

            $('#date').on('change', function (e) {
                @this.set('date', e.target.value)
            })

            window.livewire.on('chartUpdated', data => {
                let activeUsersByPlatform = {!! $activeUsersByPlatformChart->id !!};
                let allEventWithEventCountChart = {!! $allEventWithEventCountChart->id !!};
                let chartData = JSON.parse(data)

                activeUsersByPlatform.data.labels = chartData.activeUsersByPlatform.labels
                chartData.activeUsersByPlatform.datasets.forEach((value, index) => {
                    activeUsersByPlatform.data.datasets[index].label = value.label
                    activeUsersByPlatform.data.datasets[index].data = value.data
                })
                activeUsersByPlatform.update()

                allEventWithEventCountChart.data.labels = chartData.allEventWithEventCount.labels
                allEventWithEventCountChart.data.datasets[0].data = chartData.allEventWithEventCount.data
                allEventWithEventCountChart.update()
            })
        })
    </script>
@endpush




