<style>
    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }
</style>

@if ($paginator->hasPages())
    <div class="pagination">
        {{-- First Page Link --}}
        <a href="?page=1">First</a>

        {{-- Previous Page Link --}}
        @if (!$paginator->onFirstPage())
            <a href="?page={{ ($paginator->previousPageUrl()) }}">&laquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a>{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a style="color: blue" href="#">{{ $page }}</a>
                    @else
                        <a href="{{ $url  }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="?page={{ ($paginator->nextPageUrl()) }}">&raquo;</a>
        @endif

        {{-- Last Page Link --}}
        <a href="?page={{ $paginator->lastPage() }}">Last</a>
    </div>
@endif
