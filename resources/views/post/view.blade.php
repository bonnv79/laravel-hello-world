<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
$title = 'View Post';
@endphp

<x-header :title="$title" />

<body class="antialiased">
  <x-menu />
  <x-breadcrumb :menu="config('constants.BREADCRUMB_PATH.view')" />

  <div class="container">
    <h1>{{ $title }}</h1>

    <div class="card" style="width: 100%;">
      <img style="height: 30vh;" src="{{ asset('img/laravel.png') }}" class="card-img-top" alt="Img">
      <div class="card-body">
        <h3 class="card-title">
          {{ $post->title }}
        </h3>
        <p class="card-text">
          {{ $post->description }}
        </p>
      </div>
    </div>
  </div>

  <x-footer />
</body>

</html>