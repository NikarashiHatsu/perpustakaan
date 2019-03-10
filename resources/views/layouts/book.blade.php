<!DOCTYPE html>
<html lang="id" style="background-color: #181818;">
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
  <script src="{{ asset('/js/moment-with-locales.js') }}"></script>
</head>
<body>
  <header style="position: sticky; -webkit-position: sticky; top: 0; z-index: 100;">
    <nav class="mb-0 navbar navbar-expand-lg navbar-dark elegant-color">
      <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbawrCollapse">
        <ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/daftar_buku') }}">Daftar Buku</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ url('/daftar_penulis') }}">Daftar Penulis</a>
					</li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/tentang') }}">Tentang</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto nav-flex-icons">
          <li class="nav-item avatar dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              @guest
                <i class="fas fa-user-circle"></i>
              @else
                @if(Auth::user()->profile_picture != NULL || Auth::user()->profile_picture != "")
                  <img width="25px" src="{{ asset('/img/profile_pictures/' . Auth::user()->profile_picture) }}" class="rounded-circle z-depth-0" alt="avatar image">
                @else
                  <i class="fas fa-user-circle"></i>
                @endif
              @endguest
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
              @guest
                <a href="{{ route('login') }}" class="dropdown-item">Login</a>
              @else
                @if(Auth::user()->role == 0)
                  <a class="dropdown-item" href="{{ url('/siswa') }}">Profil</a>
                  <a class="dropdown-item" href="{{ url('/siswa/pengaturan') }}">Pengaturan</a>
                @elseif(Auth::user()->role == 1)
                  <a class="dropdown-item" href="{{ url('/penulis') }}">Profil</a>
                  <a class="dropdown-item" href="{{ url('/penulis/pengaturan') }}">Pengaturan</a>
                @elseif(Auth::user()->role == 2 || Auth::user()->role == 3)
                  <a class="dropdown-item" href="{{ url('/admin') }}">Profil</a>
                  <a class="dropdown-item" href="{{ url('/admin/pengaturan') }}">Pengaturan</a>
                @endif
                <a class="dropdown-item" id="logOut" href="javascript:void(0)">Logout</a>
              @endguest
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
  @php($facebook = App\Footer::where('link_for', 'facebook')->first())
  @php($twitter = App\Footer::where('link_for', 'twitter')->first())
  @php($instagram = App\Footer::where('link_for', 'instagram')->first())
  <footer class="page-footer font-small elegant-color-dark">
    @if($facebook->value != NULL || $twitter->value != NULL || $instagram->value != NULL)
      <div class="container-fluid text-center text-md-left pt-4">
        <div class="container">
          <div class="row">
            <div class="col-md-12 py-3 mb-4">
              <div class="mb-5 flex-center">
                @if($facebook->value != NULL)
                  <a class="fb-ic" href="https://facebook.com/{{ $facebook->value }}">
                    <i class="fab fa-facebook-f fa-lg white-text mx-md-4 mr-3 fa-2x"> </i>
                  </a>
                @endif
                @if($twitter->value != NULL)
                  <a class="tw-ic" href="https://twitter.com/{{ $twitter->value }}">
                    <i class="fab fa-twitter fa-lg white-text mx-md-4 mr-3 fa-2x"> </i>
                  </a>
                @endif
                @if($twitter->value != NULL)
                  <a class="ins-ic" href="https://instagram.com/{{ $twitter->value }}">
                    <i class="fab fa-instagram fa-lg white-text mx-md-4 mr-3 fa-2x"> </i>
                  </a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    @endif
    <div class="footer-copyright text-center py-3">&copy; {{ (getdate()['year'] == 2019 ? getdate()['year'] : '2019 - ' . getdate()['year']) }} Copyright:
      <a href="https://facebook.com/nikarashi.hatsu">Aghits Nidallah</a>
    </div>
  </footer>
  <form action="{{ route('logout') }}" method="post" id="logoutForm">
    @csrf
    @method('POST')
  </form>
  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/mdb.min.js') }}"></script>
  <script src="{{ asset('/js/popper.min.js') }}"></script>
  <script>
    $("#logOut").click(function() {
      $("#logoutForm").submit();
    });
  </script>
</body>
</html>