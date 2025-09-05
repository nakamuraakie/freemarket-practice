@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- 前のページリンク --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>＜</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}">＜</a></li>
        @endif

        {{-- ページ番号 --}}
        @foreach ($elements[0] as $page => $url)
            @if ($page == $paginator->currentPage())
                <li class="active"><span>{{ $page }}</span></li>
            @else
                <li><a href="{{ $url }}">{{ $page }}</a></li>
            @endif
        @endforeach

        {{-- 次のページリンク --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}">＞</a></li>
        @else
            <li class="disabled"><span>＞</span></li>
        @endif
    </ul>
@endif
