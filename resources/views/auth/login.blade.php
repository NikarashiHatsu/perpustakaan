@extends('layouts.app')
@section('content')
<main class="peach-gradient">
  <div class="container py-3 py-md-5">
    <div class="row">
      <div class="col-sm-12 col-md-8 offset-md-2 col-lg-4 offset-lg-4">
        <div class="card">
          <div class="card-header">
            <i class="fas fa-user-circle mr-3"></i>
            Login Page
          </div>
          <div class="card-body">
            <h1 class="text-center py-3 mb-4">
              <i class="fas fa-user-circle fa-2x"></i>
            </h1>
            @if($errors->all())
              <div class="alert alert-danger">
                Kode Akses atau Password salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <form action="{{ url('login') }}" method="post">
              @csrf
              <div class="row">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-user"></i>
                      </span>
                    </div>
                    <input type="text" required="required" name="access_code" class="form-control" autocomplete="off" placeholder="Kode Akses" />
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-12">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                      </span>
                    </div>
                    <input type="password" required="required" name="password" class="form-control" autocomplete="off" placeholder="Kata Sandi" />
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-sm-12">
                  <button class="btn elegant-color w-100 m-0 white-text" type="submit">
                    <i class="fas fa-unlock mr-3"></i>
                    Login
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
