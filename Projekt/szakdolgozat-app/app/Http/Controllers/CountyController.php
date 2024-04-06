<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index', County::class);
        $counties = County::all();

        return view('counties.list', compact('counties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', County::class);

        return view('counties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('store', County::class);
        $request->validate([
            'name' => 'required|unique:counties,name',
        ]);

        $county = new County();
        $county->name = $request->name;
        $county->save();

        return redirect()->route('counties.index')->with('status', 'Sikeres hozzáadás!');
    }

    /**
     * Display the specified resource.
     */
    public function show(County $county)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($countyId)
    {
        $county = County::find($countyId);
        if (!$county) 
        {
            return redirect()->route('counties.index')->with('error', 'Nem található a keresett vármegye!');
        }
        $this->authorize('edit', County::class);

        return view('counties.edit', compact('county'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $countyId)
    {
        $county = County::find($countyId);
        if (!$county) 
        {
            return redirect()->route('counties.index')->with('error', 'Nem található a keresett vármegye!');
        }
        $this->authorize('update', County::class);
        $request->validate([
            'name' => 'required|unique:counties,name',
        ]);
        $county->name = $request->name;
        $county->save();

        return redirect()->route('counties.index')->with('status', 'Sikeres módosítás!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($countyId)
    {
        $county = County::find($countyId);
        if (!$county) 
        {
            return redirect()->route('counties.index')->with('errorc', 'Nem található a keresett vármegye!');
        }
        $this->authorize('destroy', County::class);

        $county->delete();
        
        return redirect()->route('counties.index')->with('status', 'Sikeres törlés!');
    }
}
