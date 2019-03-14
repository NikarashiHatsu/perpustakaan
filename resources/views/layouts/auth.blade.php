<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') . __(' Login Page') }}</title>
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
<body id="loginPage">
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
          <li class="nav-item avatar dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <img width="25px" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0" alt="avatar image">
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
              @guest
                <a href="{{ route('login') }}" class="dropdown-item">Login</a>
              @else
                <a class="dropdown-item" href="#">Profil</a>
                <a class="dropdown-item" href="#">Pengaturan</a>
                <a class="dropdown-item" href="#">Logout</a>
              @endguest
            </div>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  @yield('content')
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/mdb.min.js') }}"></script>
  <script src="{{ asset('/js/popper.min.js') }}"></script>
</body>
</html>