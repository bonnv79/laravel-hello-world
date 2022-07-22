<div style="width: 33.33%; padding: 8px; position: relative;">
  @php
  $url = "/posts/delete/$postId";
  $urlUpdate = "/posts/update/$postId";
  $urlView = "/posts/view/$postId";
  @endphp

  <div {{ $attributes->merge(["class"=>"card"]) }}>
    <img src="{{ asset('img/laravel.png') }}" class="card-img-top" alt="Img">
    <div class="card-body">
      <h5 class="card-title text-truncate">{{$postId}} - {{$title}}</h5>
      <p class="card-text text-truncate">
        {{ $slot }}
      </p>

      <!-- <h3 class="slot3">
        {{$anotherslot}}
      </h3> -->
      <a href="{{ url($urlUpdate) }}" class="btn btn-primary">Edit</a>

      <a href="{{ url($urlView) }}" class="btn btn-secondary">View</a>

      <a href="{{ url($url) }}" class="btn btn-danger">Delete</a>
    </div>
  </div>
</div>