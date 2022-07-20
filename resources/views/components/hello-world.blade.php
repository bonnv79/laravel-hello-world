<div {{ $attributes->merge(["class"=>"alert"]) }}>
  <p>{{$title}} - {{$counterValue}} - slot: {{ $slot }}</p>

  {{$msg}}

  <h3 class="slot3">
    {{$anotherslot}}
  </h3>

  <hr />
</div>