<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') . __(' Panel Penulis') }}</title>
  <link rel="stylesheet" href="{{ asset('/css/bootstrap-select.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/all.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/mdb.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/addons/datatables.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/addons/datatables-select.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
  <script src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('/js/popper.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap-select.js') }}"></script>
  <script src="{{ asset('/js/Chart.min.js') }}"></script>
  <script src="{{ asset('/js/addons/datatables.min.js') }}"></script>
  <script src="{{ asset('/js/addons/datatables-select.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('/js/i18n/defaults-id_ID.min.js') }}"></script>
  <script src="{{ asset('/js/moment-with-locales.js') }}"></script>
</head>
<body class="elegant-color">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 p-0">
        <div class="sidebar d-sm-none d-md-block d-lg-block elegant-color-dark">
          <div class="row">
            <div class="col-sm-12 white-text text-center pt-4">
              <i class="fas fa-user-circle fa-3x"></i>
              <h5 class="mt-3 mb-2">{{ Auth::user()->name }}</h5>
            </div>
            <button class="navbar-toggler sidebar-toggler-hide white-text" type="button">
              <i class="fas fa-bars"></i>
            </button>
          </div>
          <hr class="mb-0" />
          <a href="{{ url('/penulis/') }}">
            <div class="col-sm-12 text-light py-3 sidebar-item">
              <i class="fas fa-tachometer-alt mr-3"></i>
              Dashboard
            </div>
          </a>
          <a href="{{ url('/penulis/buku') }}">
            <div class="col-sm-12 text-light py-3 sidebar-item">
              <i class="fas fa-book mr-3"></i>
              Buku
            </div>
          </a>
          <a href="{{ url('/penulis/pengaturan') }}">
            <div class="col-sm-12 text-light py-3 sidebar-item">
              <i class="fas fa-cog mr-3"></i>
              Pengaturan
            </div>
          </a>
          <a href="javascript:void(0)" onclick="logout()">
            <div class="col-sm-12 text-light py-3 sidebar-item">
              <i class="fas fa-sign-out-alt mr-3"></i>
              Logout
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-10 p-0">
        <div class="navbar elegant-color-dark py-3" style="position: sticky !important; top: 0; z-index: 10;">
          <a href="{{ url('') }}" class="white-text">
            <h4 class="m-0">{{ config('app.name', 'Laravel') }}</h4>
          </a>
          <button class="d-lg-none navbar-toggler sidebar-toggler white-text" type="button">
            <i class="fas fa-bars"></i>
          </button>
        </div>
        <div class="container-fluid p-4">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <form id="logoutForm" method="post" action="{{ route('logout') }}">
    @csrf
    @method("POST")
  </form>
  <script src="{{ asset('/js/mdb.min.js') }}"></script>
  <script>
    $().ready(function() {
      $(".navbar-toggler.sidebar-toggler").on('click', function() {
        $(".sidebar").animate({
          'left': '0vw',
        }, 300);
      });
      $(".navbar-toggler.sidebar-toggler-hide").on('click', function() {
        $(".sidebar").animate({
          'left': '-100vw',
        }, 300);
      });
    });
    function logout() {
      $("#logoutForm").submit();
    }
  </script>
</body>
</html>