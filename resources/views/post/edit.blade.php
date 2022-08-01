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

    <form action="{{ config('constants.ROUTER_PATH.POSTS.EDIT').'/'.$post->id }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Input..." name="title"
          value="{{ $post->title }}" required autofocus>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"
          required>{{ $post->description }}</textarea>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">Image</label>
        <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Input..." name="image"
          value="{{ $post->image }}">
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>

  <x-footer />
</body>

</html>