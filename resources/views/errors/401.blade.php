@extends('errors::illustrated-layout')

@section('code', '401')
@section('title', __('Akses Ditolak'))

@section('image')
    <div style="background-image: url({{ asset('/svg/403.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Maaf, Anda tidak diperbolehkan mengakses halaman ini.'))
