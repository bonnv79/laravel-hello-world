<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Create Post</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <!-- Js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  <!-- Sass -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <!-- Styles -->
  <style>
  html {
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
  }

  body {
    font-family: 'Nunito', sans-serif;
    margin: 0;
  }

  .app-title {
    margin: 1.5rem;
    text-align: center;
    font-weight: bolder;
  }
  </style>
</head>

<body class="antialiased">
  <x-menu />
  <x-breadcrumb :menu="config('constants.BREADCRUMB_PATH.view')" />

  <div class="container">
    <h1>View Post</h1>

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