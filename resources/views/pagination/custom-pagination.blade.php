@if ($paginator->hasPages())
    @php
        $current = $paginator->currentPage();
        $last = $paginator->lastPage();
        $side = 1;

        $start = max(1, $current - $side);
        $end = min($last, $current + $side);
    @endphp

    <nav aria-label="Pagination">
        <ul class="pagination justify-content-center">

            {{-- Previous --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                    &laquo;
                </a>
            </li>

            {{-- First Page --}}
            @if ($start > 1)
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
                </li>
                @if ($start > 2)
                    <li class="page-item disabled">
                        <span class="page-link">…</span>
                    </li>
                @endif
            @endif

            {{-- Page Window --}}
            @for ($page = $start; $page <= $end; $page++)
                <li class="page-item {{ $page == $current ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($page) }}">
                        {{ $page }}
                    </a>
                </li>
            @endfor

            {{-- Last Page --}}
            @if ($end < $last)
                @if ($end < $last - 1)
                    <li class="page-item disabled">
                        <span class="page-link">…</span>
                    </li>
                @endif
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->url($last) }}">{{ $last }}</a>
                </li>
            @endif

            {{-- Next --}}
            <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                    &raquo;
                </a>
            </li>

        </ul>
    </nav>
@endif
