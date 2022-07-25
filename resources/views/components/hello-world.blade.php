<div style="width: 33.33%; padding: 8px; position: relative;">
  @php
  $url = "/posts/delete/$postId";
  $urlUpdate = "/posts/update/$postId";
  $urlView = "/posts/view/$postId";
  @endphp

  <div {{ $attributes->merge(["class"=>"card"]) }}>
    <img src="{{ asset('img/laravel.png') }}" class="card-img-top" alt="Img">
    <div class="card-body">
      <a href="{{ url($urlView) }}">
        <h5 class="card-title text-truncate">{{$postId}} - {{$title}}</h5>
      </a>

      <p class="card-text text-truncate">
        {{ $slot }}
      </p>

      <!-- <h3 class="slot3">
        {{$anotherslot}}
      </h3> -->
      <!-- <div class="text-end">
        <a href="{{ url($urlUpdate) }}" class="btn btn-primary">Edit</a>
        <a href="{{ url($url) }}" class="btn btn-danger">Delete</a>
      </div> -->
    </div>
  </div>
</div>