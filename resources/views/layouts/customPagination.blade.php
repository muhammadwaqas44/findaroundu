<span class="pagination-text">Showing {{ ($paginator->currentPage()-1) * $paginator->perPage()+1 }} - {{(($paginator->currentPage()-1) * $paginator->perPage())+$paginator->count()}} of {{ $paginator->total() }}</span>
<ul class="pagination-ul">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <li><a href="javascript:void(0)" class="page_disable"><i class="fas fa-caret-left"></i></a></li>
    @else
        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-caret-left"></i></a></li>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fas fa-caret-right"></i></a></li>
    @else
        <li><a href="javascript:void(0)" class="page_disable"><i class="fas fa-caret-right"></i></a></li>
    @endif
</ul>
