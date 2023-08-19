<?php

namespace App\Http\Controllers;
use \App\Models\Category;
use \App\Models\Post;
use \App\Models\User;

// use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {

        $header = '';
        if ( request( 'category' ) ) {
            $category = Category::firstWhere( 'slug', request( 'category' ) );
            $header = ' in ' . $category->name;
        } else if ( request( 'author' ) ) {
            $author = User::firstWhere( 'username', request( 'author' ) );
            $header = ' by ' . $author->name;
        }

        return view( 'posts', [
            "title" => "Blog",
            "header" => "Daftar artikel" . $header,
            "posts" => Post::latest()->filter( request( ['search', 'category', 'author'] ) )->paginate( 7 )->withQueryString(),
            // "posts" => Post::all(),
        ] );
    }

    public function show( Post $post ) {
        return view( 'post', [
            "title" => Post::where( 'id', $post->id )->value( 'title' ),
            // $post->method yg ada di app\post.php
            "category" => $post->category,
            "author" => $post->author,
            "post" => $post,
        ] );
    }
}