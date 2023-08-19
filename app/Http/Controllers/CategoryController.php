<?php

namespace App\Http\Controllers;
use App\Models\Category;

// use Illuminate\Http\Request;

class CategoryController extends Controller {
    function category( Category $category ) {
        return view( 'posts', [
            'title' => $category->name,
            // lazy eager loading
            'posts' => $category->posts->load( 'category', 'author' ),
            'category' => $category->name,
        ] );
    }

    function categories() {
        return view( 'categories', [
            'title' => 'Categories',
            'categories' => Category::all(),
        ] );
    }
}