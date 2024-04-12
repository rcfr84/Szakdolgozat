<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\County;
use Illuminate\Http\Request;
use Exception;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($countyId)
    {
        $cities = City::where('county_id', $countyId)->orderBy('name')->get();
        
        if ($cities->count() === 0) 
        {
            return redirect()->route('cities.create', $countyId)->with('status', 'Nem található még a megyében egyetlen egy város sem, ezért adj hozzá először!');
        }
        
        $this->authorize('index', City::class);
        return view('cities.list', compact('cities'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create($countyId)
    {
        $county = County::find($countyId);
        if (!$county) 
        {
            return redirect()->route('counties.index', $countyId)->with('error', 'Nem található a keresett megye!');
        }
        $this->authorize('create', City::class);
        $county_id = $county->county_id;

        return view('cities.create', compact('county', 'county_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $countyId)
    {
        $this->authorize('store', City::class);

        $request->validate([
            'name' => 'required|unique:cities,name',
        ]);

        $city = new City();
        $city->name = $request->name;
        $city->county_id = $countyId;
        $city->save();

        return redirect()->route('cities.index', $countyId)->with('status', 'Sikeres hozzáadás!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cityId)
    {
        $city = City::find($cityId);
        try 
        {
            $countyId = $city->county_id;
            if (!$city) 
            {
                return redirect()->route('cities.index', $countyId)->with('error', 'Nem található a keresett város!');
            }
        }
        catch (Exception $e) 
        {
            return redirect()->route('counties.index')->with('error', 'Nem található a keresett város!');
        }
        $this->authorize('edit', $city);
        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $cityId)
    {
        $city = City::find($cityId);
        $countyId = $city->county_id;
        if (!$city) 
        {
            return redirect()->route('cities.index', $countyId)->with('error', 'Nem található a keresett város!');
        }
        $request->validate([
            'name' => 'required|unique:cities,name',
        ]);
        $this->authorize('update', $city);
        $city->name = $request->name;
        $city->save();

        return redirect()->route('cities.index', $countyId)->with('status', 'Sikeres módosítás!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cityId)
    {
        $city = City::find($cityId);
        $countyId = $city->county_id;
        if (!$city) 
        {
            return redirect()->route('cities.index', $countyId)->with('error', 'Nem található a keresett város!');
        }
        $this->authorize('destroy', $city);
        $city->delete();
        
        return redirect()->route('cities.index', $countyId)->with('status', 'Sikeres törlés!');
    }
    
}
