<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel Home</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <style>
  /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
  html {
    line-height: 1.15;
    -webkit-text-size-adjust: 100%
  }

  body {
    margin: 0;
    font-family: 'Nunito', sans-serif;
  }

  .center {
    display: flex;
    align-items: center;
    flex-direction: column;
  }
  </style>
</head>

<body class="antialiased">
  <div
    class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <div class="center">
      <h1>{{ $name }}</h1>

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