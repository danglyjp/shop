@if ($paginator->hasPages())
<div class="pagination__wrapper">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
        <li class="disabled"><a href="javascript:void(0);" class="prev" title="previous page">&#10094;</a></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" class="prev" title="previous page">&#10094;</a></li>
    @endif

        @foreach ($elements as $element)
        @if (is_string($element))
            <li class="disabled">{{ $element }}</li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li><a class="active">{{ $page }}</a></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

        @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" class="next" title="next page">&#10095;</a></li>
    @else
         <li><a href="javascript:void(0);" class="next" title="next page">&#10095;</a></li>
    @endif
    </ul>
</div>
@endif











{{-- @if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
        @endif
      
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li>
        @endif
    </ul>
@endif --}}