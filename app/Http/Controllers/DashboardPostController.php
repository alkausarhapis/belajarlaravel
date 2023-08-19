<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardPostController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view( 'dashboard.posts.index', [
            'posts' => Post::where( 'user_id', auth()->user()->id )->get(),
        ] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view( 'dashboard.posts.create', [
            'categories' => Category::all(),
        ] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validatedData = $request->validate( [
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body' => 'required',
        ] );

        // cek gambar kalo kosong
        if ( $request->file( 'image' ) ) {
            $validatedData['image'] = $request->file( 'image' )->store( 'post-images' );
        }

        $validatedData['excerpt'] = Str::limit( strip_tags( $request->body ), 200, '...' );
        $request->user()->posts()->create( $validatedData );

        return redirect( '/dashboard/posts' )->with( 'success', 'New post has been added' );
    }

    /**
     * Display the specified resource.
     */
    public function show( Post $post ) {
        return view( 'dashboard.posts.show', [
            'post' => $post,
        ] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Post $post ) {
        return view( 'dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all(),
        ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Post $post ) {
        $validatedData = $request->validate( [
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required',
        ] );

        // cek gambar kalo kosong
        if ( $request->file( 'image' ) ) {
            if ( $request->oldImage ) {
                Storage::delete( $request->oldImage );
            }
            $validatedData['image'] = $request->file( 'image' )->store( 'post-images' );
        }

        $validatedData['excerpt'] = Str::limit( strip_tags( $request->body ), 200, '...' );
        $post->update( $validatedData );

        return redirect( '/dashboard/posts' )->with( 'updated', 'Post has been updated' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Post $post ) {

        if ( $post->image ) {
            Storage::delete( $post->image );
        }

        Post::destroy( $post->id );
        return redirect( '/dashboard/posts' )->with( 'deleted', 'Post has been deleted' );
    }
}