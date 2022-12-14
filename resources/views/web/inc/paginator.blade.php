

@if ($paginator->hasPages())
<div class="col-md-12">
    <div class="post-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#" class="btn disabled pagination-back pull-left">@lang('weblang.back')</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-back pull-left">@lang('weblang.back')</a>
        @endif

    <ul class="pages">

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active">{{ $page }}</li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next pull-right">@lang('weblang.next')</a>
        @else
            <a href="#" class="btn disabled pagination-next pull-right">@lang('weblang.next')</a>
        @endif
    </div>
</div>
@endif