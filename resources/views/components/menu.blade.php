<nav class="navbar navbar-expand-lg bg-light app-menu">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url(config('constants.ROUTER_PATH.HOME')) }}">Laravel</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @foreach(config('constants.MENUS') as $item)
        <li class="nav-item">
          <a class="nav-link active" aria-current="welcome" href="{{ url($item['path']) }}">{{ $item['name'] }}</a>
        </li>
        @endforeach
      </ul>

      <form class="d-flex" role="search" action="{{ config('constants.ROUTER_PATH.HOME') }}">
        <input class="form-control me-2 form-control-sm" type="search" placeholder="Search" aria-label="Search"
          name="search" value="{{ $search }}" @if($autofocus) autofocus @endif>
        <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>