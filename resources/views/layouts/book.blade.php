<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/all.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/mdb.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/addons/datatables.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/addons/datatables-select.min.css') }}" />
  <script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('/js/Chart.min.js') }}"></script>
  <script src="{{ asset('/js/addons/datatables.min.js') }}"></script>
  <script src="{{ asset('/js/addons/datatables-select.min.js') }}"></script>
</head>
<body>
  <header style="position: sticky; -webkit-position: sticky; top: 0; z-index: 100;">
    <nav class="mb-0 navbar navbar-expand-lg navbar-dark elegant-color">
      <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/buku') }}">Daftar Buku</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/kontributor') }}">Daftar Kontributor</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/penerbit') }}">Daftar Penerbit</a>
					</li>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
					@guest
					@else
					@endguest
          <li class="nav-item avatar dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
							<img width="25px" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0" alt="avatar image">
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <main class="container-fluid peach-gradient py-4">
    <div class="row">
      <div class="col-sm-12">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-lg-8">
              @yield('content')
            </div>
            <div class="col-sm-12 col-lg-4">
              @yield('statistic')
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-lg-8">
              @yield('pages')
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 col-lg-8 offset-lg-2">
              @yield('per-page')
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <footer class="page-footer font-small elegant-color pt-4">
    <div class="container-fluid text-center text-md-left">
      <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">
          <h5 class="text-uppercase">Tentang Perpustakaan</h5>
          <p>Lorem ipsum dolor sit amet adipiscing consectetur elit</p>
        </div>
        <div class="col-md-3 mb-md-0 mb-3">
          <h5 class="text-uppercase">Link Refrensi</h5>
          <ul class="list-unstyled">
            <li>
              <a href="https://laravel.com">
                <i class="fab fa-laravel mr-3"></i>
                Laravel
              </a>
            </li>
            <li>
              <a href="https://mdbootstrap.com">
                <i class="fas fa-layer-group mr-3"></i>
                MDBootstrap
              </a>
            </li>
            <li>
              <a href="https://fontawesome.com">
                <i class="fab fa-font-awesome mr-3"></i>
                Font Awesome
              </a>
            </li>
            <li>
              <a href="https://jquery.com">
                <i class="fab fa-js mr-3"></i>
                jQuery
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3 mb md-0 mb-3">
          <h5 class="text-uppercase">Link Developer</h5>
          <ul class="list-unstyled">
            <li>
              <a href="https://facebook.com/nikarashi.hatsu">
                <i class="fab fa-facebook mr-3"></i>
                Facebook
              </a>
            </li>
            <li>
              <a href="https://twitter.com/nikarashihatsu">
                <i class="fab fa-twitter mr-3"></i>
                Twitter
              </a>
            </li>
            <li>
              <a href="https://github.com/nikarashihatsu">
                <i class="fab fa-github mr-3"></i>
                GitHub
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/mdb.min.js') }}"></script>
  <script src="{{ asset('/js/popper.min.js') }}"></script>
</body>
</html>