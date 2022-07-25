<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@php
$title = 'Edit Post';
@endphp

<x-header :title="$title" />

<body class="antialiased">
  <x-menu />
  <x-breadcrumb :menu="config('constants.BREADCRUMB_PATH.edit')" />

  <div class="container">
    <h1>{{ $title }}</h1>

    <form action="/posts/update/{{ $post->id }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input..." name="title"
          value="{{ $post->title }}" required>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
          required>{{ $post->description }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>

  <x-footer />
</body>

</html>