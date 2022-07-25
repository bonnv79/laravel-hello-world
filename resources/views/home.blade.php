<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-header title="Laravel" />

<body class="antialiased">
  <x-menu />

  <div class="container">
    @if (count($posts) < 1) <h2 class="not-found-data">Not Found Data</h2>
      @else
      <div class="row">
        @foreach($posts as $item)
        <x-hello-world class='danger' :id='$item->id' :post-id='$item->id' :title="$item->title">
          {{$item->description}}

          <x-slot name='anotherslot'>
            Wow! i am another slot
          </x-slot>

        </x-hello-world>
        @endforeach
      </div>
      @endif
  </div>

  <x-footer />
</body>

</html>