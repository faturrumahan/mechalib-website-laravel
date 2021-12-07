<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:50|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:16'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Registration Successfull!');
        return redirect('/login');
    }
}
