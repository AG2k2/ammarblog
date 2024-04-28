@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-evenly w-full py-2 px-3">
        <div class="w-full sm:hidden flex justify-between">
            @if (!$paginator->onFirstPage())
                <div class="w-full flex flex-start">
                    <a href="{{ $paginator->previousPageUrl() }}" class="reltive inline-flex items-center px-4 py-2 text-sm font-medium text-gray-950 bg-white border border-gray-300 leading-5 rounded-md hover:bg-gray-200 focus:outline-none  focus:ring ring-cyan-400 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 float-right">
                        {{-- « الصفحة السابقة --}}
                        {{ __("previous") }}
                    </a>
                </div>
            @endif

            @if ($paginator->hasMorePages())
            <div class="w-full flex flex-row-reverse">
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-300 leading-5 rounded-md hover:bg-gray-200 focus:outline-none  focus:ring ring-cyan-400 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 float-left">
                    الصفحة التالية »
                </a>
            </div>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-200 leading-5">
                    الموضوعات من
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        إلى
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    مجموع النتائج
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {{ $paginator->total() > 2 && $paginator->total() < 11 ? 'نتائج' : 'نتيجة' }}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if (!$paginator->onFirstPage())

                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-200 hover:text-gray-950  border-gray-300 rounded-r-md leading-5 hover:bg-cyan-400 focus:z-10 focus:outline-none active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-950 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium bg-cyan-400 text-gray-950 cursor-default leading-5">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-200  leading-5 hover:bg-cyan-400 hover:text-gray-950 focus:z-10 focus:outline-none active:bg-gray-100 active:text-gray-950 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-100  rounded-l-md leading-5 hover:bg-cyan-400 hover:text-gray-950 focus:z-10 focus:outline-none  active:bg-gray-100 active:text-gray-950 transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
