@if ($paginator->hasPages())
    <nav class="flex items-center justify-between">
        <span class="text-sm text-gray-700">
            {{ $paginator->firstItem() }} - {{ $paginator->lastItem() }} dari {{ $paginator->total() }} data
        </span>

        <ul class="pagination flex items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled px-2 py-1 bg-gray-200 text-gray-500 rounded mr-1">Previous</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-2 py-1 bg-white text-gray-700 border rounded hover:bg-gray-100 mr-1">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled px-2 py-1 bg-gray-200 text-gray-500 rounded mr-1">{{ $element }}</li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active px-2 py-1 bg-yellow-500 text-white rounded mr-1">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-2 py-1 bg-white text-gray-700 border rounded hover:bg-gray-100 mr-1">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-2 py-1 bg-white text-gray-700 border rounded hover:bg-gray-100">Next</a>
                </li>
            @else
                <li class="disabled px-2 py-1 bg-gray-200 text-gray-500 rounded">Next</li>
            @endif
        </ul>
    </nav>
@endif