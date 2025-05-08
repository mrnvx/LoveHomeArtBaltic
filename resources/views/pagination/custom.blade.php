@if ($paginator->hasPages())
    <nav class="custom-pagination">
    <!-- Previous Page Link -->
        @if ($paginator->onFirstPage())
            <span class="custom-pagination__item disabled">«</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="custom-pagination__item">«</a>
        @endif

<!--  Page Number Links  -->
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="custom-pagination__item disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="custom-pagination__item active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="custom-pagination__item">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        
<!--    Next Page Link  -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="custom-pagination__item">»</a>
        @else
            <span class="custom-pagination__item disabled">»</span>
        @endif
    </nav>
@endif
