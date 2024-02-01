<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\County;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use App\Models\Picture;

class AdvertisementController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::with('pictures')->orderByDesc('created_at')->paginate(15);
        return view('advertisements.list', compact('advertisements'));
    }

    public function ownAdvertisements()
    {
        
        $advertisements = Advertisement::where('user_id', Auth::user()->user_id)->with('pictures')
        ->orderByDesc('created_at')->paginate(15);
        return view('advertisements.ownList', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $counties = County::all();
        $cities = [];

        return view('advertisements.create', compact('categories', 'counties', 'cities'));
    }
    public function getCitiesByCounty($countyId)
    {
        $cities = City::where('county_id', $countyId)->get();
        return response()->json($cities);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
    
        $newAdvertisement = new Advertisement();
        $newAdvertisement->user_id = Auth::user()->user_id;
        $newAdvertisement->city_id = $request->city_id;
        $newAdvertisement->category_id = $request->category_id;
        $newAdvertisement->title = $request->title;
        $newAdvertisement->price = $request->price;
        $newAdvertisement->description = $request->description;
    
        if ($request->has('mobile_number')) {
            $newAdvertisement->mobile_number = $request->mobile_number;
        }
    
        $newAdvertisement->save();
    
        if ($request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $picture) {
                $filename = 'advertisement_image_' . uniqid() . '.' . $picture->getClientOriginalExtension();
                $path = $picture->storeAs('advertisement_images', $filename, 'public');
                $newAdvertisement->pictures()->create(['src' => $path]);
            }
        }
    
        return redirect()->route('advertisements.index')->with('status', 'Sikeres hozzáadás!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $advertisement = Advertisement::find($id);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.index')->with('error', 'Nincsen ilyen hirdetés!');
        }

        return view('advertisements.show', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $advertisement = Advertisement::find($id);

        if (!$advertisement) {
            return redirect()->route('advertisements.own')->with('error', 'Nincsen ilyen hirdetés!');
        }

        if (auth()->user()->user_id != $advertisement->user_id) {
            return redirect()->route('advertisements.own')->with('error', 'Csak a saját hirdetéseidet tudod módosítani!');
        }

        $advertisement->load('pictures');

        $categories = Category::all();
        $counties = County::all();
        $cities = City::where('county_id', $advertisement->county_id)->get();

        return view('advertisements.edit', compact('advertisement', 'counties', 'cities', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->user_id != Advertisement::find($id)->user_id) 
        {
            return redirect()->route('advertisements.own')->with('error', 'Csak a saját hirdetéseidet tudod módosítani!');
        }

        $advertisement = Advertisement::find($id);
        $this->authorize('update', $advertisement);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.own')->with('error', 'Nincsen ilyen hirdetés!');
        }

        $request->validate([
            'city_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'pictures.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $advertisement->user_id = Auth::user()->user_id;
        $advertisement->city_id = $request->city_id;
        $advertisement->category_id = $request->category_id;
        $advertisement->title = $request->title;
        $advertisement->price = $request->price;
        $advertisement->description = $request->description;

        if ($request->hasFile('pictures')) 
        {
            foreach ($request->file('pictures') as $picture) 
            {
                $path = $picture->store('advertisement_images', 'public');
                $advertisement->pictures()->create(['src' => $path]);
            }
        }

        if ($request->has('mobile_number')) 
        {
            $advertisement->mobile_number = $request->mobile_number;
        }

        $advertisement->update();

        return redirect()->route('advertisements.own')->with('status', 'Sikeres módosítás!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        

        if (auth()->user()->user_id != Advertisement::find($id)->user_id) 
        {
            return redirect()->route('advertisements.own')->with('error', 'Csak a saját hirdetéseidet tudod módosítani!');
        }

        $advertisement = Advertisement::find($id);

        $this->authorize('delete', $advertisement);

        if (!$advertisement) 
        {
            return redirect()->route('advertisements.own')->with('error', 'Nincsen ilyen hirdetés!');
        }

        $advertisement->delete();

        return redirect()->route('advertisements.own')->with('status', 'Sikeres törlés!');
    }

    public function showByCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $advertisements = $category->advertisements()->paginate(15);

        return view('categories.show', compact('advertisements', 'category'));
    }

    public function searchByTitle(Request $request)
    {
        $request->validate([
            'search' => 'required|min:4',
        ]);

        $search = $request->search;
        $advertisements = Advertisement::where('title', 'LIKE', "%{$search}%")->paginate(30);

        return view('advertisements.search', compact('advertisements'));
    }
}
