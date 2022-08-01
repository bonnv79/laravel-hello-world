<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
$title = $post->title;
@endphp

<x-header :title="$title" />

<body class="antialiased">
  <x-menu />
  <x-breadcrumb :menu="config('constants.BREADCRUMB_PATH.view')" />

  <div class="container">
    <h1>{{ $title }}</h1>

    <div class="card" style="width: 100%;">
      @if(strpos($post->image, 'http') !== false)
      <img src="{{ $post->image }}" style="width: 100%; height: 40vh;" class="card-img-top" alt="Img">
      @else
      <img src="{{ asset('img/laravel.png') }}" style="width: 100%; height: 30vh;" class="card-img-top" alt="Img">
      @endif

      <div class="card-body">
        <p class="card-text">
          {{ $post->description }}
        </p>
      </div>
    </div>
  </div>

  <x-footer />
</body>

</html>