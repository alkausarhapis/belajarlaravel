@extends('dashboard.layouts.main')

@section('container')

<div class="row">
    <div class="col-md-8 mb-3">
        <h2 class="mb-5">{{ $post->title }}</h2>

        <div class="button-wrapper mb-2">
            <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-left me-1"></i>Back to my posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square me-1"></i>Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn bg-danger text-white" onclick="return confirm('Yakin ingin menghapus?')"><i class="bi bi-trash"></i> Delete</button>
                </form>
        </div>
        
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-5" alt="..." style="object-fit: cover; object-position:center; height: 240px; width: 1200px" >
        @else
        <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" class="img-fluid mb-5" alt="..." style="object-position: center">
        @endif

        {{-- artinya escape character html --}}
        <div class="fs-5">
            {!! $post->body !!}
        </div> 
    </div>
</div>

@endsection