<?php

namespace App\Http\Controllers;
use App\Models\Favourite;
use App\Models\Category;
use View;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index()
    {
        // to get all data
        $data = Favourite::all();
        $categories = Category::all();
        // load view and pass users
        return View::make('favs.index')
            ->with(['data' =>$data,  'categories' =>$categories]);
    }

    public function create()
    {
        $categories = Category::all();
        return View::make('favs.create')
        ->with(['categories' =>$categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'type' => 'required'
            ]);
            $data = new Favourite;
            $data->name = $request->name;
            $data->link = $request->link;
            $data->type = $request->type;
            $data->categories_id = $request->category;
            $data->save();
            return redirect()->route('favs.index')
            ->with('success','Favourite has been created successfully.');
    }

    public function show($id)
    {
        $value = Favourite::find($id);
        $categories = Category::all();
        return View::make('favs.show')
            ->with(['value' =>$value,  'categories' =>$categories]);
    }

    public function edit($id)
    {
        $value = Favourite::find($id);
        $categories = Category::all();
        return View::make('favs.edit')
            ->with(['value' =>$value,  'categories' =>$categories]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'type' => 'required',
            'category' => 'required'
        ]);
        $data = Favourite::find($id);
        $data->name = $request->name;
        $data->link = $request->link;
        $data->type = $request->type;
        $data->categories_id = $request->category;
        $data->save();
        return redirect()->route('favs.index')
            ->with('success', 'Company Has Been updated successfully');
    }

    public function destroy($id)
    {
        $data= Favourite::find($id);
        $data->delete();
        return redirect('favs')
        ->with('success', 'Favourite has been deleted successfully');
    }
}