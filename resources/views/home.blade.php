<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel Home</title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>

  <style>
  html {
    line-height: 1.15;
    -webkit-text-size-adjust: 100%
  }

  body {
    margin: 0;
    font-family: 'Nunito', sans-serif;
  }
  </style>
</head>

<body class="antialiased">
  <x-menu />

  <div class="container ">
    <div class="row text-center">
      <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
        <h1>{{ $name }}</h1>
      </a>
    </div>

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
</body>

</html>