@php
$prev = $currentPage-1;
$next = $currentPage+1;

$prevUrl = "/posts/list/$prev/$pageSize";
$nextUrl = "/posts/list/$next/$pageSize";

$firstUrl = "/posts/list/1/$pageSize";
$lastUrl = "/posts/list/$size/$pageSize";

$options = config('constants.PAGINATION_OPTIONS');
@endphp
<div class="pagination-container">
  <nav aria-label="Page navigation example">
    <ul class="pagination pagination-sm">
      <li class="page-item @if($prev < 1) disabled @endif">
        <a class="page-link" href="{{ url($firstUrl) }}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <li class="page-item @if($prev < 1) disabled @endif">
        <a class="page-link" href="{{ url($prevUrl) }}" aria-label="Previous">
          <span aria-hidden="true">&lt;</span>
        </a>
      </li>
      @for ($i = 1; $i <= $size; $i++) @php $url="/posts/list/$i/$pageSize" ; @endphp @if($i===$currentPage) <li
        class="page-item active"><a class="page-link">{{ $i }}</a></li> @else
        <li class="page-item"><a class="page-link" href="{{ url($url) }}">{{ $i }}</a></li>
        @endif

        @endfor
        <li class="page-item @if($next > $size) disabled @endif">
          <a class="page-link" href="{{ url($nextUrl) }}" aria-label="Next">
            <span aria-hidden="true">&gt;</span>
          </a>
        </li>
        <li class="page-item @if($next > $size) disabled @endif">
          <a class="page-link" href="{{ url($lastUrl) }}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
    </ul>
  </nav>
  <span class="p-2">
    <select class="form-select form-select-sm" aria-label=".form-select-sm example" disabled>
      @foreach($options as $key => $item)
      <option value="10" @if($item==$pageSize) selected @endif>{{ $item }}</option>
      @endforeach
    </select>
  </span>
  <span class="total">
    Total: {{$total}}
  </span>
</div>