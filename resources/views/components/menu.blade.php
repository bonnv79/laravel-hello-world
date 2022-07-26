<nav class="navbar navbar-expand-lg bg-light app-menu">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">Laravel</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="welcome" href="{{ url('/welcome') }}">Welcome</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="welcome" href="{{ url('/posts/list') }}">Post List</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="welcome" href="{{ url('/posts/create') }}">Create Post</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>

      <form class="d-flex" role="search" action="/posts">
        <input class="form-control me-2 form-control-sm" type="search" placeholder="Search" aria-label="Search"
          name="search" value="{{ $search }}">
        <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>