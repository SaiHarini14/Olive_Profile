<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Models\User;
use Log;

class UserController extends Controller
{

    public function index()
    {
        // to get all data
        $users = User::all();
        // load view and pass users
        return View::make('users.index')
            ->with('users', $users);
    }

    public function create()
    {
        // load the create form (app/views/users/create.blade.php)
        return View::make('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'gender' => 'required'
        ]);
        $users = new User;
        $users->name = $request->name;
        $users->mobile = $request->mobile;
        $users->gender = $request->gender;
        $users->save();
        return redirect()->route('users.index')
            ->with('success', 'User has been created successfully.');
    }

    public function show($id)
    {
        $value = User::find($id);
        return view('users.show', compact('value'));
    }

    public function edit($id)
    {
        $value = User::find($id);
        return view('users.edit', compact('value'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
        ]);
        $users = User::find($id);
        $users->name = $request->name;
        $users->mobile = $request->mobile;
        $users->gender = $request->gender;
        $users->save();
        return redirect()->route('users.index')
            ->with('success', 'Company Has Been updated successfully');
    }

    public function destroy($id)
    {
        // delete
        $users = User::find($id);
        $users->delete();

        // redirect
        return redirect('users')
            ->with('success', 'User has been deleted successfully.');
    }
}