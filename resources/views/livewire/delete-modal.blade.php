<div class="w-1/4" x-data="{ isOpen: false }">
    <div class="text-right">
        <button type="button" @click="isOpen = true" class="text-white bg-red-500 px-4 py-2 rounded hover:bg-red-600">Delete</button>
    </div>

    <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center" x-show.transition.opacity="isOpen">
        <div class="modal-overlay absolute w-full h-full bg-gray-500 opacity-50"></div>
        
        <div class="container mx-auto lg:px-32 z-50 rounded-lg overflow-y-auto px-8">
            <div class="bg-white mx-auto w-2/4 rounded shadow" @click.away="isOpen = false">
                <div class="flex items-center px-4 py-2">
                    <span class="flex-1 text-lg text-gray-700 font-semibold">Are you absolutely sure?</span>
                    <svg @click="isOpen = false" class="w-6 h-6 text-gray-500 stroke-current cursor-pointer hover:text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none"><path d="M6 18L18 6M6 6l12 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <div class="modal-body px-4 py-2">
                    <div class="text-gray-600 tracking-tight">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit inventore nulla eius quam alias eligendi ea repellat? Dicta, quis amet?
                    </div>
                    <div class="text-gray-600 tracking-tight my-2">
                        Please type <span class="text-red-500 font-semibold">{{ $clientName }}</span> to confirm.
                    </div>
                    <form action="{{ route('clients.destroy', $clientId) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="text" name="name" wire:model.debounce.500ms="name" class="my-2 form-input bg-gray-200 block border border-transparent w-full pl-7 pr-12 text-sm leading-5 focus:bg-white focus:outline-none focus:shadow-none focus:border-green-500">

                    
                        <button class="mb-2 w-full px-4 py-2 bg-red-500 text-white rounded @if($nameValid) hover:bg-red-700 @else cursor-not-allowed opacity-50 @endif"
                            @if(!$nameValid) disabled @endif>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

