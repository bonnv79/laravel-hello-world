<div class="card-item">
  @php
  $url = config('constants.ROUTER_PATH.POSTS.REMOVE')."/$postId";
  $urlUpdate = config('constants.ROUTER_PATH.POSTS.EDIT')."/$postId";
  $urlView = config('constants.ROUTER_PATH.POSTS.VIEW')."/$postId";
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