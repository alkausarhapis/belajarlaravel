@extends('layouts.main')

@section('container')
    <h1 class="mb-4 text-center">{{ $header }}</h1>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/blog">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @elseif (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari artikel..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                  </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            @if ($posts[0]->image)
            <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid" alt="..." style="object-fit: cover; object-position:center; height: 300px" >
        @else
        <img src="https://source.unsplash.com/random/1000x200?{{ $posts[0]->category->name }}" class="card-img-top" alt="..." style="object-position: center">
        @endif
            <div class="card-body">
            <h3 class="card-title">{{ $posts[0]->title }}</h3>
            <h6 class="mb-4">By <a href="/blog?author={{ $posts[0]->author->username }}">{{ $posts[0]->author->name }}</a> Tag: <a class="text-decoration-none badge bg-primary" href="/blog?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a><small class="text-body-secondary">  {{ $posts[0]->created_at->diffForHumans() }}</small></h6>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            
            <a class="text-black" href="/posts/{{ $posts[0]->slug }}">Read more...</a>
            </div>
        </div>
    
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="position-absolute p-1" style="background-color: rgba(0, 0, 0, .7); object-position: center">
                       <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none text-white">
                        {{ $post->category->name }}
                        </a>
                    </div>
                    @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="..." style="object-fit: cover; object-position:center; height: 250px;" >
                @else
                <img src="https://source.unsplash.com/random/400x400?{{ $post->category->name }}" class="card-img-top object-fit-cover" alt="..." width="auto" height="250">
                @endif
                    <div class="card-body">
                    <h5 class="card-title">
                        <a class="text-black text-decoration-none" href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                    </h5>
                    <h6 class="mb-4">By
                         <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a> 
                        <small class="text-body-secondary">  {{ $post->created_at->diffForHumans() }}</small>
                    </h6>
                      <p class="card-text">{!! $post->excerpt !!}</p>
                      <a class="text-black" href="/posts/{{ $post->slug }}">Read more...</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @else
        <h1 class="text-center">No post found.</h1>
    @endif

    {{ $posts->links() }}

@endsection