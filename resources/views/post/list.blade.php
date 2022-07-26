<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
$title = 'Post List';
$total = $posts->total();
$pageSize = $posts->perPage();
$currentPage = $posts->currentPage();
$size = $posts->lastPage();
@endphp

<x-header :title="$title" />

<body class="antialiased">
  <x-menu />
  <x-breadcrumb :menu="config('constants.BREADCRUMB_PATH.list')" />

  <div class="container">
    <div class="row" style="align-items: center;">
      <div class="col">
        <h1>{{ $title }}</h1>
      </div>
      <div class="col text-end">
        <a class="btn btn-primary btn-sm" aria-current="welcome" href="{{ url('/posts/create') }}">Create Post</a>
      </div>
    </div>

    @if (count($posts) < 1) <h2 class="not-found-data">Not Found Data</h2>
      @else
      <div class="table-scroll">
        <table class="table table-striped table-hover table-sm table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col" class="center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $key => $item)
            @php
            $url = "/posts/delete/$item->id";
            $urlUpdate = "/posts/update/$item->id";
            @endphp
            <tr>
              <th scope="row">{{ ($currentPage - 1) * $pageSize + $key + 1 }}</th>
              <td>{{ $item->id }}</td>
              <td title="{{ $item->title }}">{{ $item->title }}</td>
              <td title="{{ $item->description }}">{{ $item->description }}</td>
              <td class="center">
                <a class="p-2" href="{{ url($urlUpdate) }}">Edit</a>
                <a class="p-2" href="{{ url($url) }}">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <x-pagination :total="$total" :size="$size" :pageSize="$pageSize" :currentPage="$currentPage" />
      @endif
  </div>

  <x-footer />
</body>

</html>