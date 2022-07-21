<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <!-- Css -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>

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

  <div class="container">
    <h1 class="app-title">{{ $name }}</h1>

    <div class="row">
      @for($counter=0; $counter
      <=5; $counter++) <x-hello-world class='danger' id='myid' title="Readerstacks" :counter-value="$counter">
        <span>My Child </span>

        <x-slot name='msg'>
          <div class='msg'>Wow!</div>
        </x-slot>

        <x-slot name='anotherslot'>
          Wow! i am another slot
        </x-slot>

        </x-hello-world>
        @endfor
    </div>
  </div>

  <x-footer />
</body>

</html>