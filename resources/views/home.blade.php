<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
$title = 'Laravel';
Debugbar::info($posts);

$total = $posts->total();
$pageSize = $posts->perPage();
$currentPage = $posts->currentPage();
$size = $posts->lastPage();

@endphp

<x-header :title="$title" />

<body class="antialiased">
  <x-menu :search="$search" autofocus />

  <div class="container app-body">
    @if($search) <h3>Search Results (<span id="search-total-items">{{ $currentPage * $pageSize }}</span>/{{ $total }})
    </h3>
    @endif

    @if (!$posts->isNotEmpty()) <h2 class="not-found-data">Not Found Data</h2>
    @else
    <div class="row" id="list-post-body">
      @foreach($posts as $item)
      <x-hello-world class='danger' :id='$item->id' :post-id='$item->id' :title="$item->title">
        {{$item->description}}

        <x-slot name='anotherslot'>
          Wow! i am another slot
        </x-slot>

      </x-hello-world>
      @endforeach
    </div>
    @endif

    @if($currentPage < $size) <div style="text-align: center;" class="p-3">
      <button id="view-more-btn" class="btn btn-outline-success">View More</button>
  </div>
  <input id="search-input-id" class="visually-hidden" name="search" value="{{ $search }}">
  <input id="current-page-id" class="visually-hidden" name="page" value="{{ $currentPage }}">
  @endif

  </div>

  <button id="scroll-top-btn-id" class="btn btn-link scroll-top-btn-class">
    <img style="width: 40px;" src="{{ asset('img/up-arrow.png') }}" alt="Img">
  </button>
  <button id="scroll-down-btn-id" class="btn btn-link scroll-down-btn-class">
    <img style="width: 40px;" src="{{ asset('img/down-arrow.png') }}" alt="Img">
  </button>

  <x-footer />
</body>

</html>