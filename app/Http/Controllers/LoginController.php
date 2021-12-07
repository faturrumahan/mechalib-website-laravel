<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class LoginController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    //auth login info input and database
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        //if authentication success
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        //if not
        $request->session()->flash('loginError', 'Login Failed!');
        return back();
    }

    //destroy current login session
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
