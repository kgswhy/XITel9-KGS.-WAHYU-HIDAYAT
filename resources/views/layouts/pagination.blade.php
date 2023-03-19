@if ($paginator->hasPages())
    <div class="mx-4 my-3">
        <div class="btn-group space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <div class="items-center p-1 text-gray-500 bg-white px-1 rounded-lg" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-6 h-6">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </div>
            @else
                <div>
                    <a class="btn btn-sm border-0 bg-white text-blue-500 px-1 hover:bg-gray-300  rounded-lg" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-6 h-6">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </a>
                </div>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <div class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></div>
                @endif
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div class="select-none rounded-lg text-white" aria-current="page">
                                <div class="btn btn-sm bg-blue-400 border-0 btn-disabled text-white">
                                    {{ $page }}
                                </div>
                            </div>
                        @else
                            <div class="select-none">
                                <a class="btn btn-sm border-0 bg-white text-blue-500 hover:bg-gray-300 hover:text-blue-500" href="{{ $url }}">
                                    {{ $page }}
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <div>
                    <a class="btn btn-sm border-0 bg-white text-blue-500 px-1 hover:bg-gray-300  rounded-lg" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-6 h-6">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </a>
                </div>
            @else
                <div class="btn btn-sm text-gray-500 border-0 btn-disabled px-1 bg-white rounded-lg" aria-label="@lang('pagination.next')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-6 h-6">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </div>
            @endif
        </div>
    </div>
@endif
