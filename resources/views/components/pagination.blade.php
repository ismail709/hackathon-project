<!-- PAGINATION -->
{{-- <div data-aos="zoom-in" class="flex justify-center items-center mt-12 space-x-2"> --}}

    {{-- Previous Page Link --}}
    {{-- <a href="{{ $locals->previousPageUrl() }}"
       class="px-4 py-2 border rounded font-medium
        {{ $locals->onFirstPage() ? 'bg-gray-300 cursor-not-allowed border-gray-300 text-gray-700' : 'bg-white border-[#91341b] text-[#91341b] hover:bg-[#f4b67d]' }}">
        <i class="fas fa-chevron-left"></i>
    </a> --}}

    {{-- Pagination Elements --}}
    {{-- @php
        $start = max($locals->currentPage() - 2, 1);
        $end = min($locals->currentPage() + 2, $locals->lastPage());
    @endphp --}}

    {{-- Show first page and ellipsis if needed --}}
    {{-- @if($start > 1)
        <a href="{{ $locals->url(1) }}"
           class="px-4 py-2 border border-[#91341b] text-[#91341b] rounded font-medium hover:bg-[#f4b67d]">
            1
        </a>
        @if($start > 2)
            <span class="px-2 text-gray-500">...</span>
        @endif
    @endif --}}

    {{-- Page Number Links --}}
    {{-- @for ($page = $start; $page <= $end; $page++)
        <a href="{{ $locals->url($page) }}"
           class="px-4 py-2 border rounded font-medium
            {{ $page == $locals->currentPage()
                ? 'bg-[#91341b] text-white cursor-default'
                : 'bg-white border-[#91341b] text-[#91341b] hover:bg-[#f4b67d]' }}">
            {{ $page }}
        </a>
    @endfor --}}

    {{-- Show last page and ellipsis if needed --}}
    {{-- @if($end < $locals->lastPage())
        @if($end < $locals->lastPage() - 1)
            <span class="px-2 text-gray-500">...</span>
        @endif
        <a href="{{ $locals->url($locals->lastPage()) }}"
           class="px-4 py-2 border border-[#91341b] text-[#91341b] rounded font-medium hover:bg-[#f4b67d]">
            {{ $locals->lastPage() }}
        </a>
    @endif --}}

    {{-- Next Page Link --}}
    {{-- <a href="{{ $locals->nextPageUrl() }}"
       class="px-4 py-2 border rounded font-medium
        {{ $locals->hasMorePages() ? 'bg-white border-[#91341b] text-[#91341b] hover:bg-[#f4b67d]' : 'bg-gray-300 cursor-not-allowed border-gray-300 text-gray-700' }}">
        <i class="fas fa-chevron-right"></i>
    </a>

</div> --}}
