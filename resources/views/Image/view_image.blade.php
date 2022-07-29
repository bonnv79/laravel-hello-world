<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
$title = 'View all image';
@endphp

<x-header :title="$title" />

<body class="antialiased">
  <x-menu />
  <x-breadcrumb :menu="config('constants.BREADCRUMB_PATH.image-view')" />

  <div class="container">
    <div class="row" style="align-items: center;">
      <div class="col">
        <h1>{{ $title }}</h1>
      </div>
      <div class="col text-end post-list-right-action">
        <a class="btn btn-primary btn-sm" aria-current="welcome"
          href="{{ url(config('constants.ROUTER_PATH.IMAGE.ADD')) }}">Add Image</a>
      </div>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Image id</th>
          <th scope="col">Image</th>
        </tr>
      </thead>
      <tbody>
        @foreach($imageData as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>
            <img src="{{ url('public/Image/'.$data->image) }}" style="height: 100px; width: 150px;">
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <x-footer />
</body>

</html>