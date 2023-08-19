<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminCategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        if ( Gate::any( ['petugas', 'admin'] ) ) {
            return view( 'dashboard.categories.index', [
                'categories' => Category::all(),
            ] );
        } else {
            return abort( 403 );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $this->authorize( 'admin' );
        return view( 'dashboard.categories.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( Request $request ) {
        $validatedData = $request->validate( [
            'name' => 'required|max:60',
            'slug' => 'required|unique:categories',
        ] );

        Category::create( $validatedData );
        return redirect( '/dashboard/categories' )->with( 'success', 'New category has been added' );
    }

    /**
     * Display the specified resource.
     */
    public function show( category $category ) {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( category $category ) {
        return view( 'dashboard.categories.edit', [
            'category' => $category,
        ] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, category $category ) {
        $validatedData = $request->validate( [
            'name' => 'required|max:60',
            'slug' => 'required|unique:categories,slug,' . $category->id,
        ] );

        $category->update( $validatedData );
        return redirect( '/dashboard/categories' )->with( 'updated', 'Category has beed updated' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( category $category ) {
        Category::destroy( $category->id );
        return redirect( '/dashboard/categories' )->with( 'deleted', 'Category has been deleted' );

    }
}