@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <h2 class="mb-5">{{ $post->title }}</h2>
            <h6>By <a href="/blog?author={{ $author->username }}">{{ $author->name }}</a>, Tag: <a class="text-decoration-none badge bg-primary" href="/blog?category={{ $category->slug }}">{{ $category->name }}</a></h6>
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-5" alt="..." style="object-fit: cover; object-position:center; height: 240px; width: 1200px" >
        @else
        <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" class="img-fluid mb-5" alt="..." style="object-position: center">
        @endif
            {{-- artinya escape character html --}}
            <div class="fs-5">
                {!! $post->body !!}
            </div> 
            <a href="/blog">Back to post</a>
        </div>
    </div>

@endsection