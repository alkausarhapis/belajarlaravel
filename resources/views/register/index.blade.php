@extends('layouts.main')

@section('container')
<div class="row justify-content-center"> 
    <div class="col-md-5">
    <main class="form-registration w-100 m-auto">
        <h1 class="text-center mb-5">Registrasi</h1>
        <form action="/register" method="post">
          {{-- csrf = keamanan (cari aja di dokumentasi) --}}
          @csrf
          <div class="form-floating">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama" name="name" value="{{ old('name') }}">
            <label for="name">Name</label>
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          
          <div class="form-floating">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
            <label for="username">Username</label>
              @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}">
            <label for="email">Email address</label>
            {{-- error method bawaan laravel untuk mengecek error pada query --}}
              @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
            <label for="password">Password</label>
              @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
      
          <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
        </form>
        <small class="d-block text-center mt-3">Sudah punya akun? Login <a href="/login">disini</a></small>
      </main>
    </div>
</div>
@endsection