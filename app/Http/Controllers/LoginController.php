<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function index() {
        // . = / (login/index)
        return view( 'login.index', [
            'title' => 'Login',
        ] );
    }

    public function authenticate( Request $request ) {
        $credentials = $request->validate( [
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:30',
        ] );

        if ( Auth::attempt( $credentials ) ) {
            // regenerate fungsinya agar menghindari session fixation
            $request->session()->regenerate();

            return redirect()->intended( '/dashboard' );
        }

        return back()->with( 'loginError', 'Login failed!' );
    }

    public function logout( Request $request ) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect( '/' );
    }
}