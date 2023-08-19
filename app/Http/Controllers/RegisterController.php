<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller {
    public function index() {
        return view( 'register.index', [
            'title' => 'Registrasi',
        ] );
    }

    public function store( Request $request ) {
        $validatedData = $request->validate( [
            'name' => 'required|min:3|max:255',
            'username' => 'required|min:5|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:30',
        ] );

        // CRUD
        User::create( $validatedData );

        // Flasher
        return redirect( '/login' )->with( 'success', 'Registrasi berhasil! Silakan Login' );
    }
}