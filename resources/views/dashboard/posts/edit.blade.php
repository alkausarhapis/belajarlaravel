@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
  </div>

  <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5 col-lg-8" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" autofocus>
      @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
      @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Slug</label>
      <select class="form-select" name="category_id">
        @foreach ($categories as $category)         
        <option value="{{ $category->id }}"  {{ old('category_id') == $category->id ? ' selected' : ' ', $category->id }}>{{ $category->name }}</option>
        @endforeach
      </select>
    </div>
    
    <div class="mb-3">
      <label for="image" class="form-label">Post image</label>
      <input type="hidden" name="oldImage" value="{{ $post->image }}">
      @if ($post->image)
      <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="">
      @else
      <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
      @endif
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
      <p class="text-danger">{{ $message }}</p>
  @enderror
    </div>

    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        @error('body')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
        <trix-editor input="body"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Update Post</button>
  </form>

  <script>
    // mengisi form slug
       const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        
          title.addEventListener('keyup', function() {
          let preslug = title.value;
          preslug = preslug.replace(/ /g,"-");
          slug.value = preslug.toLowerCase();
          });


    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault()
    })

        // Preview image
        function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection