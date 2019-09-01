@if ($paginator->hasPages())
    <div class="text-center pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="item-pagination flex-c-m trans-0-4">&#8249; Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="item-pagination flex-c-m trans-0-4 active-pagination hov-bg-black">&#8249; Previous</a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="item-pagination  flex-c-m trans-0-4 active-pagination hov-bg-black">Next &#8250;</a>
        @else
            <span class="item-pagination flex-c-m trans-0-4">Next &#8250;</span>
        @endif
    </div>
@endif
