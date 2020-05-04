@if ($paginator->hasPages())
    <div>
        <p class="text-sm leading-5 text-gray-700">
        <span>Showing</span>
        <span class="font-medium">{{ $paginator->firstItem() }}</span>
        <span>to<span>
        <span class="font-medium">{{ $paginator->lastItem() }}</span>
        <span>out of<span>
        <span class="font-medium">{{ $paginator->total() }}</span>
        <span>results<span>
        </p>
    </div>

    <ul class="pagination flex" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="relative inline-flex items-center px-2 py-2 rounded-l-md bg-white text-sm leading-5 font-medium text-gray-500 opacity-50 cursor-not-allowed focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </span>
            </li>
        @else
            <li class="page-item">
                <button type="button" wire:click="previousPage" class="relative inline-flex items-center px-2 py-2 rounded-l-md bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 ">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled d-none d-md-block" aria-disabled="true">
                    <button type="button" class="-ml-px relative inline-flex items-center px-4 py-2 bg-white text-sm leading-5 font-medium text-green-500 hover:text-green-700 focus:z-10 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 active:text-green-700 transition ease-in-out duration-150">
                        { $page }}
                    </button>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active d-none d-md-block" aria-current="page">
                            <span class="page-link -ml-px relative inline-flex items-center px-4 py-2 bg-white text-sm leading-5 font-medium text-green-500 hover:text-green-700 focus:z-10 focus:outline-none focus:shadow-outline-blue active:bg-gray-100 active:text-green-700 transition ease-in-out duration-150 cursor-default">{{ $page }}</span>
                        </li>
                    @else
                        <li class="page-item d-none d-md-block">
                            <button type="button" class="page-link hidden md:inline-flex -ml-px relative items-center px-4 py-2 bg-white text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <button type="button" wire:click="nextPage" class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </button>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md bg-white text-sm leading-5 font-medium text-gray-500 opacity-50 cursor-not-allowed focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                </span>
            </li>
        @endif
    </ul>
@endif