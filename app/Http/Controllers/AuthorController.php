<?php

namespace App\Http\Controllers;
use \App\Models\User;

class AuthorController extends Controller {
    public function author( User $author ) {
        return view( 'posts', [
            'title' => "Author",
            // lazy eager loading
            'posts' => $author->posts->load( 'category', 'author' ),
            'author' => $author->name,
        ] );
    }
}