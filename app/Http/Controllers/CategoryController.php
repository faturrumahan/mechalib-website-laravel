<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //Display a listing of the resource and bring data from categories table.
    public function index()
    {
        return view('home', [
            "title" => "Home",
            "category" => Category::all()
        ]);
    }
}
