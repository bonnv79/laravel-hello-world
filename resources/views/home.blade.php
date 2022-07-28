<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
$title = 'Laravel';

$total = $posts->total();
$pageSize = $posts->perPage();
$currentPage = $posts->currentPage();
$size = $posts->lastPage();

$searchTotal = $currentPage * $pageSize;

if($searchTotal > $total) {
$searchTotal = $total;
}

@endphp

<x-header :title="$title" />

<body class="antialiased">
  <x-menu :search="$search" autofocus />

  <div class="container app-body">
    @if($search) <h3>Search Results (<span id="search-total-items">{{ $searchTotal }}</span>/{{ $total }})
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

  <div class="scroll-root-class"
    style="position: fixed; bottom: 8px; right: 8px; z-index: 1; display: flex; flex-direction: column;">
    <button id="scroll-top-btn-id" class="scroll-top-btn-class"
      style="background: transparent; border: none; margin: 3px;">
      <img style="width: 40px;" src="{{ asset('img/up-arrow.png') }}" alt="Img">
    </button>
    <button id="scroll-down-btn-id" class="scroll-down-btn-class"
      style="background: transparent; border: none; margin: 3px;">
      <img style="width: 40px;" src="{{ asset('img/down-arrow.png') }}" alt="Img">
    </button>
  </div>

  <div id="app-spinner-id" class="spinner-container" style="width: 100%;
  height: 100vh;
  position: fixed;
  z-index: 100;
  top: 0;
  left: 0;
  background: #0000006e;
  display: flex;
  justify-content: center;
  align-items: center;
  visibility: hidden;">
    <div class="spinner-border text-light" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>

  </div>

  <x-footer />
</body>

</html>