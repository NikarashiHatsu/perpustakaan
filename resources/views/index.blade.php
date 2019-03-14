@extends('layouts.app')
@section('content')
<div class="container-fluid peach-gradient py-4" style="color: rgba(255, 255, 255, 1);">
  <div class="row">
    <div class="col-sm-12 col-lg-6 text-center" style="margin-top: 8rem;">
      <i class="fas {{ $content->fa_icon }} fa-5x"></i>
    </div>
    <div class="col-sm-12 col-lg-6 py-5">
      <h1>{{ config('app.name') }}</h1>
      <hr />
      <p style="text-align: justify;">{!! nl2br($content->content) !!}</p>
    </div>
  </div>
</div>
@endsection