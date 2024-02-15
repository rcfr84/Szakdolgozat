<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role->name !== 'admin') 
        {
            return redirect()->route('categories.index')->with('status', 'Nincsen megfelelő jogosultságod!');
        }
        //$users = User::all()->sortBy('name');

        $users = User::where('role_id', '!=', 1)->orderBy('name', 'asc')->paginate(15);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userId)
    {
        $user = User::find($userId);

        $this->authorize('destroy', $user);

        if (!$user) 
        {
            return redirect()->route('users.index')->with('status', 'Nincsen ilyen felhasználó!');
        }

        $user->delete();

        return redirect()->route('users.index')->with('status', 'Sikeres törlés!');
    }
}
