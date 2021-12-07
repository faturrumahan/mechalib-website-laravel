<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;

class ItemController extends Controller
{
    //Display a listing of the resource and bring data from table items based on request.
    public function index()
    {
        $items = Item::latest();
        $from = "Search";

        //if user search by category
        if (request('category')) {
            $cat = Category::firstWhere('slug', request('category'));
            $from = $cat->name;
        }

        return view('item', [
            "title" => "Item",
            "from" => $from,
            "items" => $items->filter(request(['search', 'category']))
                ->paginate(16)->withQueryString()
        ]);
    }

    // Display the specified resource.
    public function detail(Item $detail)
    {
        return view('detail', [
            "title" => "detail",
            "item" => $detail
        ]);
    }
}
