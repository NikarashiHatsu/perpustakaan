@extends('errors::illustrated-layout')

@section('code', '503')
@section('title', __('Layanan Tidak Tersedia'))

@section('image')
    <div style="background-image: url({{ asset('/svg/503.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __($exception->getMessage() ?: 'Maaf, kita sedang melakukan perbaikan. Silahkan datang lain kali.'))
