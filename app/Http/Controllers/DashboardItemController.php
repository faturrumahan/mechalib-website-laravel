<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardItemController extends Controller
{
    /**
     * Display a listing of the resource and bring data from table items based user_id.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.item.index', [
            'items' => Item::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource and bring data from table categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.item.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'category_id' => 'required',
            'user_id' => 'required',
            'desc' => 'required',
            'image' => 'required|image|file|max:5000'
        ]);

        $validatedData['slug'] = SlugService::createSlug(Item::class, 'slug', $validatedData['name']);
        $validatedData['image'] = $request->file('image')->store('submission-img');

        Item::create($validatedData);
        $request->session()->flash('success', 'Submission Successfull!');
        return redirect('dashboard/items');
    }

    /**
     * Display the specified resource from table items.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('dashboard.item.show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource and bring data from table categories.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('dashboard.item.edit', [
            'item' => $item,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'category_id' => 'required',
            'user_id' => 'required',
            'desc' => 'required',
            'image' => 'nullable|image|file|max:5000'
        ]);

        $validatedData['slug'] = SlugService::createSlug(Item::class, 'slug', $validatedData['name']);

        //if user upload new image
        if ($request->file('image')) {
            Storage::delete($request->old_img);
            $validatedData['image'] = $request->file('image')->store('submission-img');
        }

        Item::where('id', $item->id)->update($validatedData);

        $request->session()->flash('success', 'Submission Updated!');
        return redirect('dashboard/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Storage::delete($item->image);
        Item::destroy($item->id);
        return redirect('dashboard/items')->with('success', 'Submission Deleted!');
    }
}
