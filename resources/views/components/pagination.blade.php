@php
$prev = $currentPage-1;
$next = $currentPage+1;

function getUrl($vSearch = '', $vPage = 1, $vPageSize = 10) {
return url(config('constants.ROUTER_PATH.POSTS.LIST')."?search=$vSearch&page=$vPage&pageSize=$vPageSize");
}

$prevUrl = getUrl($search, $prev, $pageSize);
$nextUrl = getUrl($search, $next, $pageSize);

$firstUrl = getUrl($search, 1, $pageSize);
$lastUrl = getUrl($search, $size, $pageSize);

$options = config('constants.PAGINATION_OPTIONS');
@endphp

<div class="pagination-container">
  <span class="total">
    Total: {{$total}}
  </span>

  <nav class="p-2" aria-label="Page navigation example">
    <ul class="pagination pagination-sm">
      <li class="page-item @if($prev < 1) disabled @endif">
        <a class="page-link" href="{{ $firstUrl }}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item @if($prev < 1) disabled @endif">
        <a class="page-link" href="{{ $prevUrl }}" aria-label="Previous">
          <span aria-hidden="true">&lt;</span>
        </a>
      </li>
      @for ($i = 1; $i <= $size; $i++) @if($i===$currentPage) <li class="page-item active"><a
          class="page-link">{{ $i }}</a></li> @else
        <li class="page-item"><a class="page-link" href="{{ getUrl($search, $i, $pageSize) }}">{{ $i }}</a></li>
        @endif

        @endfor
        <li class="page-item @if($next > $size) disabled @endif">
          <a class="page-link" href="{{ $nextUrl }}" aria-label="Next">
            <span aria-hidden="true">&gt;</span>
          </a>
        </li>
        <li class="page-item @if($next > $size) disabled @endif">
          <a class="page-link" href="{{ $lastUrl }}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
    </ul>
  </nav>

  <span>
    <form class="d-flex" role="search" action="{{config('constants.ROUTER_PATH.POSTS.LIST')}}" method="GET">
      <input class="visually-hidden" name="search" value="{{ $search }}">
      <input class="visually-hidden" name="page" value="1">
      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="pageSize"
        onchange="this.form.submit()">
        @foreach($options as $key => $item)
        <option value="{{ $item }}" @if($item==$pageSize) selected @endif>{{ $item }}</option>
        @endforeach
      </select>
    </form>
  </span>
</div>