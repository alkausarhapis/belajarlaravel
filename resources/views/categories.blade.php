@extends('layouts.main')

@section('container')
    <h1 class="mb-4">Post Categories</h1>

    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4 my-5">
            <div class="card">
                <img src="https://source.unsplash.com/random/500x500?{{ $category->name }}" class="card-img object-fit-cover" alt="..." width="auto" height="250">
                <div class="card-img-overlay d-flex align-items-center p-0">
                    <h5 class="card-title text-center flex-fill p-2" style="background-color: rgba(0, 0, 0, .7)">
                        <a class="text-white text-decoration-none" href="/blog?category={{ $category->slug }}">{{ $category->name }}</a>
                    </h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection