<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
$title = 'View All Image';
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
          <th scope="col" style="width: 100px;">Image ID</th>
          <th scope="col" style="width: 250px;">Image</th>
          <th scope="col">URL</th>
        </tr>
      </thead>
      <tbody>
        @foreach($imageData as $data)
        <tr>
          <td>{{$data->id}}</td>
          <td>
            @if(strpos($data->image, 'http') !== false)
            <img src="{{ $data->image }}" style="height: 100px; width: 150px;">
            @else
            <img src="{{ url('public/Image/'.$data->image) }}" style="height: 100px; width: 150px;">
            @endif
          </td>
          <td>{{$data->image}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <x-footer />
</body>

</html>