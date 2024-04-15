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
        $this->authorize('index', User::class);
        
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
            return redirect()->route('users.index')->with('error', 'Nincsen ilyen felhasználó!');
        }
        if ($user->role_id == 1) 
        {
            return redirect()->route('users.index')->with('error', 'Adminisztrátort nem lehet törölni!');
        }

        $user->delete();

        return redirect()->route('users.index')->with('status', 'Sikeres törlés!');
    }

    public function searchByName(Request $request)
    {
        $this->authorize('searchByName', User::class);

        $request->validate([
            'search' => 'required|min:3',
        ]);

        $search = $request->search;
        $names = User::where('name', 'LIKE', "%{$search}%")->paginate(15);

        return view('users.search', compact('names'));
    }
}
