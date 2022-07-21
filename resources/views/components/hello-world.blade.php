<div style="width: 50%; padding: 8px;">
  <div {{ $attributes->merge(["class"=>"card"]) }}>
    <img src="{{ asset('img/laravel.png') }}" class="card-img-top" alt="Img">
    <div class="card-body">
      <h5 class="card-title">{{$counterValue + 1}} - {{$title}}</h5>
      {{ $slot }}

      {{$msg}}

      <h3 class="slot3">
        {{$anotherslot}}
      </h3>
      <a href="#" class="btn btn-primary">View more</a>
    </div>
  </div>
</div>