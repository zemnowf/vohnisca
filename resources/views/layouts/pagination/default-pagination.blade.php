@if ($paginator->hasPages())
    <nav class="custom-pagination">
        <div class="pagination-mobile">
            <ul class="pagination-list">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="pagination-item disabled" aria-disabled="true">
                        <span class="pagination-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="pagination-item">
                        <a class="pagination-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="pagination-item">
                        <a class="pagination-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="pagination-item disabled" aria-disabled="true">
                        <span class="pagination-link">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="pagination-desktop">
            <div class="pagination-info">
                <p class="pagination-stats">
                    {!! __('Showing') !!}
                    <span class="pagination-highlight">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="pagination-highlight">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="pagination-highlight">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div class="pagination-nav">
                <ul class="pagination-list">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="pagination-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span class="pagination-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="pagination-item">
                            <a class="pagination-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="pagination-item disabled" aria-disabled="true"><span class="pagination-link">{{ $element }}</span></li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="pagination-item active" aria-current="page"><span class="pagination-link">{{ $page }}</span></li>
                                @else
                                    <li class="pagination-item"><a class="pagination-link" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="pagination-item">
                            <a class="pagination-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                        </li>
                    @else
                        <li class="pagination-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="pagination-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
