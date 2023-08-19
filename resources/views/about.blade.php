@extends('layouts.main')

@section('container')
    <h1>Halaman about</h1>
    <h2>Name : {{ $nama }}</h2>
    <h2>Email : {{ $email }}</h2>
    <img src="img/{{ $foto }}" alt="">
@endsection
