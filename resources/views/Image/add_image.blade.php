<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
$title = 'Add Image';
@endphp

<x-header :title="$title" />

<body class="antialiased">
  <x-menu />
  <x-breadcrumb :menu="config('constants.BREADCRUMB_PATH.image-add')" />

  <div class="container">
    <h1>{{ $title }}</h1>

    <form method="post" action="{{ route('images.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="image">
        <label>
          <h4>Select image</h4>
        </label>
        <input type="file" class="form-control" required name="image">
      </div>

      <div style="margin: 8px 0;" class="post_button">
        <button type="submit" class="btn btn-success">Add</button>
      </div>
    </form>
  </div>

  <x-footer />
</body>

</html>