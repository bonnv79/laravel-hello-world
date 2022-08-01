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
      <div class="col text-end post-list-right-action">
        <form class="d-flex p-2" role="search" action="{{config('constants.ROUTER_PATH.POSTS.LIST')}}" method="GET">

          <div class="btn-group btn-group-sm me-2" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="sort" id="btnradio2" autocomplete="off" value="DESC"
              @if($sort=='DESC' ) checked @endif onchange="this.form.submit()">
            <label class="btn btn-outline-primary" for="btnradio2">Desc</label>

            <input type="radio" class="btn-check" name="sort" id="btnradio1" autocomplete="off" value="ASC"
              @if($sort=='ASC' ) checked @endif onchange="this.form.submit()">
            <label class="btn btn-outline-primary" for="btnradio1">Asc</label>
          </div>

          <input class="form-control me-2 form-control-sm" type="search" placeholder="Search" aria-label="Search"
            name="search" value="{{ $search }}" autofocus>
          <input class="visually-hidden" name="page" value="1">
          <input class="visually-hidden" name="pageSize" value="{{ $pageSize }}">
          <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
        </form>

        <a class="btn btn-primary btn-sm" aria-current="welcome"
          href="{{ url(config('constants.ROUTER_PATH.POSTS.ADD')) }}">Create Post</a>
      </div>
    </div>

    @if (!$posts->isNotEmpty()) <h2 class="not-found-data">Not Found Data</h2>
    @else
    <div class="table-scroll">
      <table class="table table-striped table-hover table-sm table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image URL</th>
            <th scope="col" class="center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $key => $item)
          @php
          $url = config('constants.ROUTER_PATH.POSTS.REMOVE')."/$item->id";
          $urlUpdate = config('constants.ROUTER_PATH.POSTS.EDIT')."/$item->id";
          @endphp
          <tr>
            <td scope="row">{{ ($currentPage - 1) * $pageSize + $key + 1 }}</td>
            <td>{{ $item->id }}</td>
            <td>
              @if(strpos($item->image, 'http') !== false)
              <img src="{{ $item->image }}" style="width: 50px; height: 50px;" class="card-img-top" alt="Img">
              @else
              <img src="{{ asset('img/laravel.png') }}" style="width: 50px; height: 50px;" class="card-img-top"
                alt="Img">
              @endif
            </td>
            <td title="{{ $item->title }}">{{ $item->title }}</td>
            <td title="{{ $item->description }}">
              <!-- <x-html-entity-decode :value="$item->description" /> -->
              <!-- {!! html_entity_decode($item->description) !!} -->
              {{ $item->description }}
            </td>
            <td title="{{ $item->image }}">{{ $item->image }}</td>
            <td class="center">
              <a class="p-2" href="{{ url($urlUpdate) }}">Edit</a>
              <a class="p-2" href="{{ url($url) }}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <x-pagination :total="$total" :size="$size" :pageSize="$pageSize" :currentPage="$currentPage" :search="$search"
      :sort="$sort" />
    @endif
  </div>

  <x-footer />
</body>

</html>